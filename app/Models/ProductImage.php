<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    use HasFactory;
    protected $fillable=['id', 'image', 'product_size_id'];
    protected $table='product_images';

    public function productColorSize(){
        return $this->belongsTo(ProductColorSize::class,'product_id');

    }

}
