<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['id', 'name', 'image', 'prodect_id'];
    protected $table='categories';

    public function child()
    {
        return $this->hasMany(category::class,'prodect_id');
    }
    public function product()
    {
        return $this->hasMany(product::class,'category_id');
    }
}
