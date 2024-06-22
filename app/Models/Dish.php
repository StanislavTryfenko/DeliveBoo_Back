<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Dish extends Model
{

    protected $fillable = ['name', 'slug', 'price', 'image', 'description', 'visible', 'restaurant_id'];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class)->withPivot('dish_name', 'dish_quantity', 'dish_price');
    }
    use HasFactory;
}
