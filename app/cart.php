<?php

namespace App;

class Cart{
     
     public $items = [];
     public $quantity;
     public $total_price;


     public function __construct($cart=null)
     {
     	if($cart)
     	{
           $this->items       = $cart->items;
           $this->total_price = $cart->total_price;
           $this->quantity    = $cart->quantity;
     	}
     	else
     	{
          $this->items = [];
          $this->total_price = 0;
          $this->quantity = 0;
     	}
     }

     public function add($product)
     {
        $item =[
        	 'id'=>$product->id,
        	 'name'=>$product->name,
        	 'price'=>$product->price,
        	 'quantity'=>0,
        	 'image'=>$product->img
        ];

        if(!isset($this->items[$product->id]))
        {
        	$this->items[$product->id] = $item;
        	$this->quantity+=1;
        	$this->total_price += $product->price;
        }
        else
        {
        	 $this->quantity +=1;
        	 $this->total_price +=$product->price;
        }
        $this->items[$product->id]['quantity']+=1;
     }

     public function update($id,$quantity)
     { 

        $this->quantity-=$this->items[$id]['quantity'];
        $this->total_price-=$this->items[$id]['price']*$this->items[$id]['quantity'];

        //update quantity

        $this->items[$id]['quantity']=$quantity;
        $this->quantity +=$quantity;
        $this->total_price += $this->items[$id]['price']*$quantity; 

     }

     public function remove($id)
     {
        if(isset($this->items[$id]))
        {
             $this->quantity-=$this->items[$id]['quantity'];
             $this->total_price-=$this->items[$id]['price']*$this->items[$id]['quantity'];
             unset($this->items[$id]);
        }
     }

}