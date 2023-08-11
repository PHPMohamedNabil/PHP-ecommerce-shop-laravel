@extends('admin/app')

@section('content')


<div class="col-lg-10 ml-5">
              <!-- Form Basic -->
             
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">New SubCateogry</h6>
                </div>
                <div class="card-body">
                  
                  <form action="{{route('subCategory.store')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name">
                      @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Slug</label>
                      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter slug" name="slug">
                       @error('slug')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <select class="form-control @error('parent_id') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="parent_id">
                          @foreach($categories as $category)
                             <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select>
                       @error('parent_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                      @enderror
                    </div>
                    <div class="form-group">
                     <label>Photo:</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="customFile" name="photo"> 
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      @error('photo')
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