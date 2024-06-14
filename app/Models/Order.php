<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['customer_name','customer_lastname','customer_phone_number','customer_address','customer_email','total_price','date','status'];

    use HasFactory;
}
