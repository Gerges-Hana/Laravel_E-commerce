<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColorSize extends Model
{
    use HasFactory;

    protected $fillable=['id', 'product_color_size_product_size_id', 'product_color_size_product_color_id', 'quantity', 'price_tow', 'descound', 'status'];
    protected $table='product_color_size';

    public function productColor(){
        return $this->belongsTo(ProductColor::class);

    }
    public function productSize(){
        return $this->belongsTo(ProductSize::class);

    }
}

