<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=['id', 'user_id', 'status', 'Payment_method', 'Payment_status', 'Payment_id', 'total_price', 'adderess', 'phone', 'email', 'name', 'sursname', 'city', 'postal_code', 'country', 'shipping_price','created_at', 'updated_at'];
    protected $table='orders';

    public function user(){
        return $this->belongsTo(User::class);
    }

}
