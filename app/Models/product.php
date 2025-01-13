<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        "title",
        "slug",
        "image",
        "price",
        "description"
        ];

        protected $casts = [
            "price"=> "decimal:2"
        ];

}
