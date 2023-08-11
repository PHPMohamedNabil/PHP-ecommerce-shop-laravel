@extends('admin/app')

@section('content')
  
	<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
             
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Customer {{$user->name}} Order | <b>Total Price :@php $total=0 @endphp @foreach($carts as $cart) @php $total+=$cart->total_price @endphp  @endforeach {{number_format($total, 2)}} $</b></h6>
                </div>
              </div>
              <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($carts as $cart)
            <div class="card mb-3">
                <div class="card-body">
                    @foreach($cart->items as $item)
                      <div class="card-header">Item Serial #{{$item['id']}}</div>
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
                        Total Price :{{$cart->total_price}} $
                    </span>
                </button>
            </p>

            </div>
                        @endforeach
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