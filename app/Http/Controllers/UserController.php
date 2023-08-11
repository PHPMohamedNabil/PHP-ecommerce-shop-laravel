<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;

class UserController extends Controller
{
    //


    public function index()
    {
    	return view('admin.users',['users'=>User::where('is_admin','!=',1)->get()]);
    }

    public function userOrders()
    {
    	return view('admin.user_orders',['orders'=>Order::latest()->get()]);
    }

    public function userOrdersAdmin($order_user_id)
    {
        if(count(Order::where('user_id',$order_user_id)->get()))
     {
        $user    = User::findorFail($order_user_id);
        $orders  = Order::where('user_id',$order_user_id)->get();
        $carts   = $orders->transform(function($cart,$key){
          return unserialize($cart->cart);
      });
     }
        return view('admin.all_user_orders',['carts'=>$carts,'user'=>$user]);
    }

    public function deleteUser($id,Request $request)
    {
        if($id !== auth()->user()->id)
        {
           User::findorFail($id)->delete();

           return back(); 
        }
        else
        {
            return abort(403);
        }
        
    }


}
