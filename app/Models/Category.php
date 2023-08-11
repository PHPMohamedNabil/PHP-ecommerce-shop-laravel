<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Product;


class Category extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function sub_category()
    {
       return $this->hasMany(SubCategory::class);
    }

    public function product()
    {
    	return $this->hasMany(Product::class);
    }
}
