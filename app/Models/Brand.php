<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Brand extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'logo'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class);
    }

}
