@extends('admin/app')

@section('content')
  
	<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive p-3">
                    	<table class="table table-hover table-flush align-items-center" id="data_table">
                    		<thead>
                    			<th>Id</th>
                    			<th>Name</th>
                    			<th>Email</th>
                                <th>join Date</th>
                                <th>Orders</th>
                    		</thead>
                    		<tbody>
                    		 @foreach($users as $user)
                    			<tr>
                    				<td>{{$user->id}}</td>
                    				<td>{{$user->name}}</td>
                    				<td>{{$user->email}}</td>
                                    <td>{{$user->created_at}} </td>
                                    <td>
                                        <a href="{{route('user_orders_admin',$user->id)}}" class="btn btn-success">Orders </a>
                                        <a href="{{route('deleteUser',$user->id)}}" class="btn btn-danger">Delete </a>
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