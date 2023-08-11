<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
       // return dd(SubCategory::with('category')->get());
        
        return view('admin.SubCategory.index',['subs'=>SubCategory::with('category')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.SubCategory.create',['categories'=>Category::all()]);
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
             'name'=>'required|unique:sub_categories',
             'slug'=>'required',
             'photo'=>'required|mimes:png,jpeg,jpg',
             'parent_id'=>'required'
         ]);


         $image = $request->file('photo')->store('public/files');

         SubCategory::create([
                'name'=>$request->get('name'),
                'slug'=>$request->get('slug'),
                'parent_id'=>$request->get('parent_id'),
                'img'=>$image
           ]);
            
              notify()->success('subCategory Created Successfully');
          
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
    public function edit($id)
    {
        return view('admin.subCategory.edit',['sub'=>SubCategory::findOrFail($id),'category'=>Category::all()]);
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
             'name'=>'required|string|unique:sub_categories,name,'.$id.',id',
             'slug'=>'required',
             'photo'=>'mimes:png,jpeg,jpg',
             'parent_id'=>'required'
         ]);
        
        if($request->hasFile('photo'))
        {

         $image = $request->file('photo')->store('public/files');

         SubCategory::where('id',$id)->update([
                'name'=>$request->get('name'),
                'slug'=>$request->get('slug'),
                'parent_id'=>$request->get('parent_id'),
                'img'=>$image
           ]);

           notify()->success('subCategory Created Successfully');
          
           return back();
        }

         else
         {
           
           SubCategory::where('id',$id)->update([
                'name'=>$request->get('name'),
                'slug'=>$request->get('slug'),
                'parent_id'=>$request->get('parent_id'),
           ]);
            
              notify()->success('subCategory Created Successfully');
          
           return back();
         }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          SubCategory::where('id',$id)->delete(); 
          notify()->success('subCategory Deleted Successfully');

           return back();
    }

    public function parentSubCate(Request $request,$cat_id)
    {   
        return response()->json(SubCategory::where('parent_id',$cat_id)->get());
    }
}
