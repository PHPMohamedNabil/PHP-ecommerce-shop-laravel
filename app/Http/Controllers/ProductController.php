<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Products.index',['products'=>Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Products.create',['categories'=>Category::all(),'sub_category'=>SubCategory::all()]);
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
             'name'           =>'required|unique:products',
             'description'    =>'required',
             'img'            =>'required|mimes:png,jpeg,jpg',
             'price'          =>'required|numeric',
             'stock'          =>'required|integer',
             'category_id'    =>'required|integer',
             'sub_category_id'=>'nullable|integer'
         ]);

        $image = $request->file('img')->store('public/files');

         Product::create([
                'name'            => $request->get('name'),
                'price'           => $request->get('price'),
                'description'     => $request->get('description'),
                'img'             => $image,
                'stock'           => $request->get('stock'),
                'category_id'     => $request->get('category_id'),
                'sub_category_id' => $request->get('sub_category_id'),
           ]);
            
              notify()->success('Product Created Successfully');
          
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
       // return view('product',['product'=>Product::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.Products.edit',['product'=>Product::find($id),'categories'=>Category::all(),'sub_category'=>SubCategory::all()]);
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
             'name'           =>'required|unique:products,name,'.$id.',id',
             'description'    =>'required',
             'img'            =>'mimes:png,jpeg,jpg',
             'price'          =>'required|numeric',
             'stock'          =>'required|integer',
             'category_id'    =>'required|integer',
             'sub_category_id'=>'nullable|integer'
         ]);

        if($request->hasFile('img'))
        {
           
         
         $product  = Product::findOrFail($id);

         \Storage::delete($product->img);
         
         $image    = $request->file('img')->store('public/files');

         Product::where('id',$id)->update([
                'name'            => $request->get('name'),
                'price'           => $request->get('price'),
                'description'     => $request->get('description'),
                'img'             => $image,
                'stock'           => $request->get('stock'),
                'category_id'     => $request->get('category_id'),
                'sub_category_id' => $request->get('sub_category_id'),
           ]);
            
              notify()->success('Product Created Successfully');
          
           return back();
        }

         Product::where('id',$id)->update([
                'name'            => $request->get('name'),
                'price'           => $request->get('price'),
                'description'     => $request->get('description'),
                'stock'           => $request->get('stock'),
                'category_id'     => $request->get('category_id'),
                'sub_category_id' => $request->get('sub_category_id'),
           ]);
            
              notify()->success('Product Created Successfully');
          
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
       $product  = Product::find($id);

       $image_name = $product->img;

       $product->delete();

       \Storage::delete($image_name);

        notify()->success('Product Deleted Successfully');

        return back();
    }

}
