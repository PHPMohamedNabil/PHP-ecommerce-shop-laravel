<p>
	Your Order Requested Order From Laptops has finished
</p>
<table id="cart" class="table table-hover">
 		<thead>
 			<tr>
 				<th scope="col">#</th>
 				<th scope="col">Image</th>
 				<th scope="col">Product</th>
 				<th scope="col">Price</th>
 				<th scope="col">Quantity</th>
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
 			</tr>
 		@endforeach
 		</tbody>
 		<p>
 			if you want to see your order  <a href="{{url('/orders')}}">please go to</a>
 		</p>
</table>