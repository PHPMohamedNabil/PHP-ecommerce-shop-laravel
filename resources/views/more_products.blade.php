@extends('layouts.app')

@section('content')
<div class="container">
  	<form action="" method="get" class="mb-5">
  		
  		<div class="form-row">
  			<div class="col-md-8">
  				<input type="search" name="search" class="form-control"/>
  			</div>
  			<div class="col">
  				<button type="submit" class="btn btn-info"><i class="fas fa-magnifier"></i> Search</button>
  			</div>
  		</div>
  	</form>
    
       <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
       @foreach($products as $product)
        <div class="col-md-3">
          <div class="card shadow-sm mb-4">
            <img src="{{Storage::url($product->img)}}" height="100" style="width:100%" />
            <div class="card-body">
             <p>
                 <b>{{substr($product->name,0,50)}}</b> 
             </p>
             <p class="card-text">
                 {{substr($product->description,0,150)}} ...
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{route('product_show',$product->id)}}" class="btn btn-sm btn-outline-secondary">
                        View
                    </a>
                  <a href="{{route('add_to_cart',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add to Cart</a>
                </div>
                <small class="text-muted">{{$product->price}} L.E</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach

          </div>
          {{$products->links()}}

</div>

<footer class="text-muted py-5 text-white bg-info">
  <div class="container-fluid text-white">
    <div class="row text-white">
        <div class="col-md-8 text-white">
           
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>
    <p class="mb-1">Copy Right © ClothesShop 2022, but please download and customize it for yourself!</p>
    <p class="mb-0">Call us phone Number? <a href="#contact" id="contact">+02568988845</a> or Email at <a href="mailto:clothesshop@gmail.com">clothesshop@gmail.com</a></p> 
        </div>
        <div class="col-md-4">
            <ul style="display: inline-block;">
               <li  style="display: inline-block;">Shope</li>
               <li  style="display: inline-block;">Categories</li>
               <li  style="display: inline-block;">About</li>
            </ul>
        </div>
    </div>
    
  </div>

</footer>
@endsection