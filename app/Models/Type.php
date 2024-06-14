<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    /**
     * Get all of the restaurants for the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function restaurants(): hasMany
    {
        return $this->hasMany(Restaurant::class);
    }
}

