<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable=['id', 'product_color_size_id', 'order_id', 'quantity', 'price', 'diccound', 'created_at', 'updated_at'];
    protected $table='order_detelles';


    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function productColorSize(){
        return $this->belongsTo(ProductColorSize::class);
    }

}
