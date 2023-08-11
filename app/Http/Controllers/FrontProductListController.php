<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Slider;

class FrontProductListController extends Controller
{
    //


    public function index()
    {   
        $random_product = Product::inRandomOrder()->limit(3)->get();
        $random_ids = [] ;
        $sliders = Slider::all();
       
        foreach ($random_product as $product)
        {
            $random_ids[] = $product->id; 
        }

        $randomItems = Product::whereNotIn('id',$random_ids)->limit(3)->get();

    	return view('product',['products'=>Product::latest()->limit(10)->get(),'category'=>Category::all(),'randomItems'=>$randomItems,'random_product'=>$random_product,'sliders'=>$sliders,'cates'=>Category::all()]);
    }
    
    public function allProductByCate($name,Request $request)
    {
        $category = Category::where('name',$name)->first();
        $category_id = $category->id;
        $sub_cats = SubCategory::where('parent_id',$category->id)->get();
        
        if($request->subcategory)
        {
          $products = $this->filterProduct($request);
          $filter   = $this->filterSubs($request);
           $name     = $name;
        
         return view('product_category',compact('products','sub_cats','name','filter','category_id')); 
        }
        elseif($request->min || $request->max){
           $products = $this->filterByPrice($request);
           $name     = $name;
        
         return view('product_category',compact('products','sub_cats','name','category_id')); 
        }

        else
        {
          $products = Product::where('category_id',$category->id)->get();
          $name     = $name;
        
         return view('product_category',compact('products','sub_cats','name','category_id')); 
        }
        
        
    }

    public function filterProduct(Request $request)
    {
       $subId       = [];
       $subCategory = SubCategory::whereIn('id',$request->subcategory)->get();

       foreach ($subCategory as $sub)
       {
            $subId[]=$sub->id;
       }

       $products = Product::whereIn('sub_category_id',$subId)->get();
       
          return $products;

    }

    public function filterByPrice(Request $request)
    {
       $products = Product::whereBetween('price',[$request->min,$request->max])->where('category_id',$request->category_id)->get();

       return $products;

    }

    public function filterSubs(Request $request)
    {
       $subId       = [];
       $subCategory = SubCategory::whereIn('id',$request->subcategory)->get();

       foreach ($subCategory as $sub)
       {
            $subId[]=$sub->id;
       }
       
          return $subId;

    }
  

    public function showProductPage($id)
    {
    	 $product = Product::findOrFail($id);
         
         $recommand = Product::inRandomOrder()->where('category_id',$product->category_id)->where('id','!=',$product->id)->limit(3)->get();

    	 return view('product_show',compact('product','recommand'));
    }

    public function moreProducts(Request $request)
    {  
      if ($request->search)
      {
         $products = Product::where('name','like','%'.$request->search.'%')->orWhere('description','like','%'.$request->search.'%')->paginate(50);

        return view('more_products',compact('products'));
      }
       $products = Product::latest()->paginate(50);

        return view('more_products',compact('products'));
    }
    
}
