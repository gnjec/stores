<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    /**
     * Get the parent urlable model (product or category...).
     */
    public function urlable()
    {
        return $this->morphTo();
    }
}
