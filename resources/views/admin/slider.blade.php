@extends('admin/app')

@section('content')

<div class="col-lg-6">
              <!-- Form Basic -->
             
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">New Slider Image</h6>
                </div>
                <div class="card-body">
                  
                  <form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                     <label>Photo:</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input @error('photo') is-invalid @enderror" id="customFile" name="image"> 
                        <label class="custom-file-label" for="customFile">Choose Slider Image</label>
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

  <div class="col-lg-6">
  	<div class="table-responsive">
  		<table class="table table-hover table-bordered">
  		  <thead>
  		  	<th>Image</th>
  		  	<th>#</th>
  		  </thead>
  		  <tbody>
  		  	@foreach($sliders as $slider)
  		  	  <tr>
  		  	  	<td>
  		  	  		<img src="{{Storage::url($slider->image)}}" width="160"/>
  		  	  	</td>
  		  	  	<td>
  		  	  		<form onsubmit="return confirmDelete();" method="post" action="{{route('slider.destroy',$slider->id)}}" style="display:inline-block;">
  		  	  			{{method_field('DELETE')}}
  		  	  			@csrf
  		  	  			<input type="hidden" name="id" value="{{$slider->id}}">
  		  	  			<button type="submit" class="btn btn-danger">
  		  	  		        <i class="fas fa-trash"></i>
  		  	  	        </button>
  		  	  		</form>
  		  	  	</td>
  		  	  </tr>
  		  	@endforeach
  		  </tbody>
     	</table>
  	</div>
  	
  </div>
   


<script type="text/javascript">
	function confirmDelete()
	{
		if(confirm('will delete slider Image ??'))
		{
			return true;
		}
		else{
			return false;
		}
	}
</script>
@endsection