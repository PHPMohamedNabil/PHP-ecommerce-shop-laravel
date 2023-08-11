<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class OrderController extends Controller
{
    //



    public function userOrders()
    {
    	return view('admin.user_orders',['orders'=>Order::latest()->get()]);
    }

    public function Order($user_id,$order_id)
    {
     if(count(Order::where('id',$order_id)->get()))
     {
       $user    = User::findorFail($user_id);
      $orders  = $user->order->where('id',$order_id);
      $carts   = $orders->transform(function($cart,$key){
          return unserialize($cart->cart);
      });
     }
     else{
       return abort(404);
     }

     // return dd($carts);

      return view('admin.order_view',compact('carts','user'));
       

    }

    public function deleteOrder($id)
    {
       Order::findOrFail($id)->delete();

       return back();
    }

    public function approveOrder($order_id)
    {
        Order::findOrFail($order_id)->update(['status'=>1]);
        return back();
    }





}
