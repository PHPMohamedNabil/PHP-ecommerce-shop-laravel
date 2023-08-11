@extends('admin/app')

@section('content')
  
	<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary"> Cateogry</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                    	<table class="table table-hover table-flush align-items-center" id="data_table">
                    		<thead>
                    			<th>name</th>
                    			<th>slug</th>
                    			<th>description</th>
                    			<th>image</th>
                    			<th>action</th>
                    		</thead>
                    		<tbody>
                    		 @foreach($categories as $cat)
                    			<tr>
                    				<td>{{$cat->name}}</td>
                    				<td>{{$cat->slug}}</td>
                    				<td>{{$cat->description}}</td>
                    				<td>
                    					<img src="{{asset(Storage::url($cat->img))}}" width="45" height="45">
                    				</td>
                    				<td>
                    					<form action="{{route('category.destroy',$cat->id)}}" method="post" style="display:inline-block;" onsubmit="return checkDelete();">
                    						@csrf
                    						{{method_field('DELETE')}}
                    						<button type="submit" name="" class="btn btn-sm btn-danger">
                    							<i class="fas fa-trash"></i>
                    						</button>
                    					</form>
                    					<a href="{{route('category.edit',$cat->id)}}" class="btn btn-warning btn-sm">
                    						<i class="fas fa-edit"></i>
                    					</a>
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