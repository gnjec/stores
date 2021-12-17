<?php

namespace App\Models;

use App\Models\Url;
use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'price', 'description'];

    /**
     * The stores that belong to the product.
     */
    public function stores()
    {
        return $this->belongsToMany(Store::class)->withTimestamps();
    }

    /**
     * Get the product's url.
     */
    public function url()
    {
        return $this->morphOne(Url::class, 'urlable');
    }
}
