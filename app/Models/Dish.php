<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{

    protected $fillable = ['name', 'slug', 'price', 'image', 'description', 'visible', 'restaurant_id'];

    use HasFactory;
}
