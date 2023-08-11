@extends('admin/app')

@section('content')
  
	<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                    	<table class="table table-hover table-flush align-items-center" id="data_table">
                    		<thead>
                    			<th>Img</th>
                    			<th>Name</th>
                    			<th>Price</th>
                    			<th>Stock</th>
                                <th>Category</th>
                    			<th>Action</th>
                    		</thead>
                    		<tbody>
                    		 @foreach($products as $product)
                    			<tr>
                                    <td>
                                        <img src="{{asset(Storage::url($product->img))}}" width="45" height="45">
                                    </td>
                    				<td>{{$product->name}}</td>
                    				<td>{{$product->price}} L.E</td>
                                    <td>{{$product->stock}}</td>
                    				<td>{{$product->category->name ?? ''}}</td>
                    				
                    				<td>
                                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary btn-sm">
                                            Edit
                                        </a>
                    					<form action="{{route('product.destroy',$product->id)}}" method="post" style="display:inline-block;" onsubmit="return checkDelete();">
                    						@csrf
                    						{{method_field('DELETE')}}
                    						<button type="submit" name="" class="btn btn-sm btn-danger">
                    							Delete
                    						</button>
                    					</form>
                    					
                    				</td>
                    			</tr>
                    		 @endforeach
                    		</tbody>
                    	</table>
                    </div>
                </div>
              </div>
    </div>
<script type="text/javascript">
	function checkDelete()
	{
		 if(confirm('Are you sure you want delete this entry ??'))
		 {
		 	return true;
		 }
		 return false;
	}
</script>
@endsection