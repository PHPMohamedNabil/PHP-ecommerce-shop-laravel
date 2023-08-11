@extends('layouts.app')

@section('content')
   

<div class="container">
    <div class="card">
        <div class="row">
            <aside class="col-sm-5 border-right">
                <section id="" class="gallery-wrap">
                    <div class="img-big-wrap">
                        <a href="#">
                            <img src="{{Storage::url($product->img)}}" width="100%">
                        </a>
                    </div>
                </section>
                
            </aside>
            <aside class="col-sm-7">
                <section class="card-body p-5">
                    <h3 class="title mb-3">
                      <b>  {{$product->name}}</b>
                    </h3>
                    <p class="price-detail-wrap">
                         <span class="price h3 text-center text-info">
                             <span class="currency">
                                 {{$product->price}} L.E
                             </span>
                         </span>
                    </p>
                    <h3>
                        Description
                    </h3>
                    <br>
                    <p>
                        {{$product->description}}
                    </p>
                    <br>
                    <hr>
                    <br>
                    <div class="row">
                        <hr>
                        <a  href="{{route('add_to_cart',$product->id)}}" class="btn btn-lg btn-outline-primary text-uppercase">
                            Add to cart
                        </a>
                    </div>
                </section>
            </aside>
        </div>
    </div>
    @if(count($recommand) >0)
<div class="jumbotron mt-3">
    <h2>You May Also Like</h2>
    <div class="row">
      @foreach($recommand as $product)
       <div class="col-md-4">
          <div class="card shadow-sm">
            <img src="{{Storage::url($product->img)}}" width="100%" height="275">
            <div class="card-body">
             <p>
                 <b>{{$product->name}}</b> 
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
      
       
    
</div>
@endif
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
