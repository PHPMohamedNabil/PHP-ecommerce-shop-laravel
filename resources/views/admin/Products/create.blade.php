@extends('admin/app')

@section('content')


<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
             
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">New Product</h6>
                </div>
                <div class="card-body">
                  
                  <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Product name" name="name" value="{{old('name')}}">
                      @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Price</label>
                      <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Price" name="price">
                       @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>

                     <div class="form-group">
                      <label for="exampleInputEmail1">description</label>
                      <textarea class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="description">
                        {{old('description')}}
                    </textarea>
                       @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">stock</label>
                      <input type="number" step="0.0" class="form-control @error('stock') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Stock Number" name="stock">
                       @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <select class="form-control @error('category_id') is-invalid @enderror" id="parent_id" aria-describedby="emailHelp" name="category_id" onchange="return get_category();">
                          @foreach($categories as $category)
                             <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select>
                       @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category</label>
                      <select class="form-control @error('sub_category_id') is-invalid @enderror" id="sub_category" aria-describedby="emailHelp" name="sub_category_id">
                          <option>---</option>
                      </select>
                       @error('sub_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>
                    <div class="form-group">
                     <label>Photo:</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input @error('img') is-invalid @enderror" id="customFile" name="img"> 
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>

                   
   </div>


@endsection

@section('script')

 <script type="text/javascript">

      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        get_category();

       function get_category()
       {
           let parent_id    = parseInt($('#parent_id').val());

           let sub_category = $('#sub_category');

           var output       = ``;

           let route        = '{{route("category_ajax","#")}}';

           let url          = route.replace("#",parent_id);

             
           //  console.log(url);

           sub_category.html('<option>..Loading</option>');
           
           if(parent_id)
           {
              $.get(url,{parent_id:parent_id},function(data){
                    
                    if(data.length)
                    {
                      
                         //console.log(data[0].id);
                         data.map((val,key)=>{
                        //  console.log(val);
                           output+=`<option value="${val.id}">${val.name}</option>`;
                         })
                     
                       return sub_category.html(output);
                    }
                    else
                    {
                       return sub_category.html(`<option value="">--</option>`);
                    }
              });

                 // console.log(output);

            
           }
       }
 </script>
 

@endsection