<?php

namespace App\Models;

use App\Models\Url;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    /**
     * Get the store that owns the product.
     */
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    /**
     * Get the product's url.
     */
    public function url()
    {
        return $this->morphOne(Url::class, 'urlable');
    }
}
