@extends('layouts.app')

@section('content')
<style type="text/css">

</style>
<div class="container">
 <main>

  <section class="container-fluid text-center col-md-12 justify-content-center align-items-center">
    <div class="container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    @foreach($sliders as $key => $slider)
    <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}" class="{{$key == 0 ?'active':''}}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($sliders as $key => $slider)
    <div class="carousel-item {{$key == 0 ?'active':''}}">
      <img src="{{Storage::url($slider->image)}}" style="width:100%;height:100%"/>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
  </section>
   <h2 class="text-center p-4 " style="font-size: 22px;">Choose f<span class="border-bottom border-sucess">rom Your</span> Collections</h2>
      <div class="row">
   @foreach($category as $cat)
 
        <div class="col-md-4">
            <div class="content">
                <div class="content-overlay">                
                </div>
                        <img class="content-image" src="{{Storage::url($cat->img)}}">
                    
                    <div class="content-details fadeIn-bottom">
                     <a href="{{route('cate_slug',$cat->name)}}">    <h3 class="content-title">{{$cat->name}}</h3></a>
                        <p class="content-text"><i class="fa fa-map-marker"></i> {{$cat->slug}}</p>
                    </div>
                </a>
            </div>
        </div>
    
   @endforeach
      </div>
  <div class="album py-5 bg-light">
    <div class="container">
        <h2 class="display-4 border-bottom border-info mb-3" style="width:58%;"><b >Latest Products</b></h2>
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
        </div>
        <div class="row justify-content-center align-items-center">
          
           <a href="{{route('more_products')}}" style="display: block;" href="" class="btn btn-success">More Products</a>
        
        </div>
      </div>
    </div>
  </div>
   <div class="container">
      <h2 style="font-size: 20px;">Randoms</h2> 
  <div class="jumbotron">

       <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
     <div class="carousel-item active">
      <div class="row">
         @foreach($randomItems as $product)
          <div class="col-4">
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
    <div class="carousel-item">
      <div class="row">

      @foreach($random_product as $product)
        <div class="col-4">
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
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   </div>
   </div>
</main>
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
</div>
@endsection
