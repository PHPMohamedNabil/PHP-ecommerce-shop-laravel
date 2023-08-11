<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.Categories.index',['categories'=>Category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
             'name'=>'required|unique:categories',
             'description'=>'required',
             'photo'=>'required|mimes:png,jpeg,jpg'
         ]);


         $image = $request->file('photo')->store('public/files');

         Category::create([
                'name'=>$request->get('name'),
                'slug'=>$request->get('slug'),
                'description'=>$request->get('description'),
                'img'=>$image
           ]);
            
              notify()->success('Category Created Successfully');
          
           return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
         return view('admin.Categories.edit',['cate'=>Category::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
         $request->validate([
             'name'=>'required|string|unique:categories,name,'.$id.',id',
             'description'=>'required',
             'slug'       =>'required',
             'photo'=>'mimes:png,jpeg,jpg'
         ]);
      
        if($request->hasFile('photo'))
        {  
           $image = $request->file('photo')->store('public/files');
          
           Category::where('id',$id)->update([
                  'name'        => $request->get('name'),
                  'description' => $request->get('description'),
                  'slug'        => $request->get('slug'),
                  'img'         => $image
              ]);
             
             notify()->success('Category Edited Successfully');
             return back();

        
        }

          Category::where('id',$id)->update([
                  'name'        => $request->get('name'),
                  'description' => $request->get('description'),
                  'slug'        => $request->get('slug')
              ]);
             
             notify()->success('Category Edited Successfully');
             return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          Category::where('id',$id)->delete(); 
          notify()->success('Category Deleted Successfully');
          
          return back();
    }
}
