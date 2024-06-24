<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class Order extends Model
{
    protected $fillable = ['customer_name','customer_lastname','customer_phone_number','customer_address','customer_email','total_price','date','status'];

    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function dishes():BelongsToMany
    {
        return $this->belongsToMany(Dish::class)->withPivot('dish_name', 'dish_quantity', 'dish_price');
    }
    use HasFactory;
}
