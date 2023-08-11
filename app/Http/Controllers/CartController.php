<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;
use App\Models\Order;

class CartController extends Controller
{
    //

    public function addToCart(Product $product)
    {
       if(session()->has('cart'))
       {
          $cart = new Cart(session()->get('cart'));
       }
       else
       {
       	  $cart = new Cart();
       }
       
       $cart->add($product);

        session()->put('cart',$cart);
        notify()->success('Product added To your Cart');
           
           return redirect()->back();
    }

    public function showCart()
    {
       if(session()->has('cart'))
       {
          $cart = new Cart(session()->get('cart'));
       }
       else
       {
          $cart = null;
       }
      return view('cart',compact('cart'));
    }

    public function updateCart(Request $request,Product $product)
    {   
      $request->validate([
        'qty'=>'required|integer|min:1'
      ]);
        $cart = new Cart(session()->get('cart'));

        $cart->update($product->id,$request->qty);
        session()->put('cart',$cart);
        notify()->success('Cart Updated');
           
           return redirect()->back();
    }

    public function deleteCartProduct(Request $request)
    {
       $cart = new Cart(session()->get('cart'));
       
       $cart->remove($request->id);

       if($cart->quantity<=0)
       {
           session()->forget('cart');
           notify()->success('Cart product Removed');
           return redirect()->back();
       }
       else
       {
          session()->put('cart',$cart);
           notify()->success('Cart product Removed');
           return redirect()->back();
       }
    }

    public function checkout($amount)
    {
      if(session()->has('cart'))
       {
          $cart = new Cart(session()->get('cart'));
       }
       else
       {
          $cart = new Cart();
       }
      return view('checkout',compact('amount','cart'));
    }

    public function charge(Request $request)
    {
      /*$charge = Stripe::charges()->create([
          'currency'=>'USD',
          'source'=>$request->stripeToken,
          'amount'=>$request->amount,
          'description'=>'test laptop'
      ]);
      $chargeId = $charge['id'];*/

     //  return (dd($request->payment));
        auth()->user()->order()->create([
          'cart'=>serialize(session()->get('cart')),
          'method'=>($request->payment =='card'?1:0)
        ]);
        if(session()->has('cart'))
       {
          $cart = new Cart(session()->get('cart'));
       }
       else
       {
          $cart = null;
       }       
      //  Mail::to(auth()->user()->email)->send(new OrderShipped($cart));

           session()->forget('cart');
           notify()->success('Transaction completed');
           return redirect()->route('main');
       // return dd($request->stripeToken);
      
     
          return redirect()->back();
      
    }

    public function order(Request $request)
    {
      $orders  = auth()->user()->order;
      $carts   = $orders->transform(function($cart,$key){
          return unserialize($cart->cart);
      });
      $order_all = Order::where('user_id',auth()->user()->id)->pluck('status');
        
      //  return dd($order_all);
       return view('order',compact('carts','order_all'));
    }
}
