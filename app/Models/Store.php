<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'code', 'base_url', 'description'];

    /**
     * The products that belong to the store.
     */
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
