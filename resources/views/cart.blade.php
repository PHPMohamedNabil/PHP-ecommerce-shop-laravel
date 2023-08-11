@extends('layouts.app')

@section('content')

 <div class="container">
 	@if($errors->any())
 	   @foreach($errors->all() as $error)
        <div class="alert alert-danger">
        	{{$error}}
        </div>
       @endforeach
 	@endif
 	@if($cart)
 	<table id="cart" class="table table-hover">
 		<thead>
 			<tr>
 				<th scope="col">#</th>
 				<th scope="col">Image</th>
 				<th scope="col">Product</th>
 				<th scope="col">Price</th>
 				<th scope="col">Quantity</th>
 				<th scope="col">update</th>
 				<th>Remove</th>
 			</tr>
 		</thead>
 		<tbody>
 		 @foreach($cart->items as $product)
 			<tr>
 				<td>#</td>
 				<td><img src="{{Storage::url($product['image'])}}" width="100" /></td>
 				<td>{{$product['name']}}</td>
 				<td>{{$product['price']}}</td>
 				<td>{{$product['quantity']}}</td>
 				<td>
 				    <form action="{{route('cart_update',$product['id'])}}" method="post">
 				    	@csrf
 					      <input type="number" name="qty" value="{{$product['quantity']}}">
 					      <button class="btn btn-secondary btn-sm" type="submit">
 						<i class="fas fa-sync"></i>Update
 					      </button>
 				    </form>
 				</td>
 				<td>
 					<form action="{{route('cart_remove')}}" method="post">
 						@csrf
 						<input type="hidden" name="id" value="{{$product['id']}}">
 						<button class="btn btn-danger" type="submit">Remove</button>
 					</form>
 				</td>
 			</tr>
 		@endforeach
 		</tbody>
 	</table>
 	 	<hr>
 	<div class="card-footer">
 		<a href="{{route('main')}}" class="btn btn-warning" >Continue Shopping</a>
 		<span style="margin-left:300px;">Total Price : {{$cart->total_price}}</span>
 		<a href="{{route('checkout',$cart->total_price)}}" class="btn btn-info float-right">Checkout</a>
 	</div>
 	@else
       <p class="text-center">No Items In Cart <a class="btn btn-primary btn-lg" href="{{route('main')}}">Contiune Shopping</a> </p>
 	@endif

 </div>

@endsection