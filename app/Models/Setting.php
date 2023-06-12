<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable=['id', 'title', 'description', 'whatsapp', 'phone', 'etc', 'addresses', 'email', 'logo', 'faveicon', 'facebook', 'twitter', 'instagram', 'youtube', 'tiktok'];
    protected $table='settings';
}
