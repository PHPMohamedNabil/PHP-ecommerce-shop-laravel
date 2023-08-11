@extends('layouts.app')

@section('content')

 <div class="container">
 	<div class="row justify-content-center">
 		<div class="col-md-8">
            <span class="badge badge-warning">
              
            </span>
 			@foreach($carts as $cart_key => $cart)

 			<div class="card mb-3">
 				<div class="card-body">
 					@foreach($cart->items as $item)
                     @if($order_all[$cart_key] ==0)
                        Status:  <span class="bg-info text-white">Pending</span>
                     @else
                        Status:       <span class="bg-success text-white">Shipped</span>
                     @endif
 					<span class="float-right">
 						<img src="{{Storage::url($item['image'])}}" width="100">
 					</span>
                     <p>{{$item['name']}}</p>
                      <br>
                     <p>Price: {{$item['price']}} $</p>

                     <p>Quantity: {{$item['quantity']}}</p>
 					@endforeach
 				</div>
 				<p>
 				<button class="btn btn-warning" type="button">
 					<span class="badge badge-light">
 						Total Price :{{$cart->total_price}}
 					</span>
 				</button>
 			</p>

 			</div>
 			 			@endforeach
 		</div>
 	</div>
 </div>


@endsection