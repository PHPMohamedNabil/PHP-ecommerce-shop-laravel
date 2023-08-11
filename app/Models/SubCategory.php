<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Product;

class SubCategory extends Model
{
    use HasFactory;
    
    protected $guarded=[];

    public function category()
    {
    	return $this->belongsTo(Category::class,'parent_id');
    }

        public function product()
    {
    	return $this->hasMany(Product::class);
    }
}
