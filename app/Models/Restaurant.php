<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Restaurant extends Model
{
    use HasFactory;
    protected $fillable = ['contact_email', 'vat', 'name', 'slug', 'address', 'phone_number', 'logo', 'thumb', 'user_id'];

    /**
     * Get the user that owns the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the type that owns the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function types(): belongsToMany
    {
        return $this->belongsToMany(Type::class);
    }
}
