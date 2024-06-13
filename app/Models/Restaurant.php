<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['contact_email','vat','name','slug','address','phone_number','logo','thumb'];

    use HasFactory;
}
