<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    //

    

    public function create()
    {
    	return view('admin.slider',['sliders'=>Slider::all()]);
    }

    public function save(Request $request)
    {
    	 $request->validate(['image'=>'required|mimes:jpeg,png']);

    	 $image = $request->file('image')->store('public/slider');

    	 Slider::create([
    	 	'image'=>$image
    	 ]);
    	 notify()->success('Image Slider Created Successfully');
          
           return redirect()->route('slider');
    }

    public function destroy($id)
    {
    	 Slider::findOrFail($id)->delete();
    	 notify()->success('Image Slider Deleted Successfully');
    	 return redirect()->route('slider');
    }
}
