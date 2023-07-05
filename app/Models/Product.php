<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory ,SoftDeletes;

    protected $fillable=['id', 'name', 'description', 'image', 'price', 'discount_price', 'category_id', 'created_at', 'updated_at', 'deleted_at'];
    protected $table='products';

    public function Category(){
        return $this->belongsTo(category::class,'category_id');
    }

    public function productColorSize(){
        return $this->hasMany(ProductColorSize::class,'product_id');

    }
    public function productColor(){
        return $this->hasMany(ProductColor::class,'product_id');

    }
    public function productSize(){
        return $this->hasMany(ProductSize::class,'product_id');

    }


    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }


}
