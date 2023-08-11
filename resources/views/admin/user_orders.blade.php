@extends('admin/app')

@section('content')
  
	<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Order Table</h6>
                </div>
                <div class="card-body">
                    @if(count($orders)>1)
                    <div class="table-responsive p-3">
                    	<table class="table table-hover table-flush align-items-center" id="data_table">
                    		<thead>
                    			<th>OrderNumder</th>
                                <th>status</th>
                    			<th>Name</th>
                    			<th>Email</th>
                                <th>Date</th>
                                <th>method</th>
                                <th>Explore</th>
                    		</thead>
                    		<tbody>
                    		 @foreach($orders as $order)
                    			<tr>
                                    <td>{{$order->id}}</td>
                                    <td>
                                         @if($order->status == 0)
                                         <span class="p-1 btn-info text-white">Pending</span>
                                         @else
                                         <span class="p-1 bg-success text-white">
                                            Shipped
                                         </span>
                                         @endif
                                    </td>
                    				<td>{{$order->user->name ??" "}}</td>
                    				<td>{{$order->user->email ??" "}}</td>
                    				<td>
                                        {{date('Y-m-d',strtotime($order->created_at))}}
                                    </td>
                                    <td>
                                        @if($order->method == 0)
                                         <span class="p-1 bg-primary text-white">Cashe</span>
                                         @else
                                         <span class="p-1 bg-secondary text-white">
                                             Bank Card
                                         </span>
                                         @endif
                                    </td>
                                    <td>
                                      @if($order->user && $order->status ==0)
                                              <a href="{{route('approve_order',[$order->id])}}" class="btn btn-sm btn-secondary btn-sm">Approve</a>
                                       @endif
                                       @if($order->user)
                                              <a href="{{route('order_view',[$order->user->id,$order->id])}}" class="btn btn-info btn-sm">View Orders</a>
                                       @endif
                                        
                                        <a class="btn btn-danger btn-sm" href="{{route('order_delete',$order->id)}}">Delete Order</a>
                                    </td>
                    			</tr>
                    		 @endforeach
                    		</tbody>
                    	</table>
                    </div>
                    @else
                       <p> No Orders made yet.</p>
                    @endif
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