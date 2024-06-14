<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  
    use HasFactory;

    protected $fillable = ['contact_email','vat','name','slug','address','phone_number','logo','thumb'];

}
