<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    public static function product($path)
    {
        return Url::where('path', $path)->firstOrFail()->urlable;
    }

    public static function path($slug, $default)
    {
        return (!$slug || Url::where('path', $slug)->exists()) ? $default : $slug;
    }

    /**
     * Get the parent urlable model (product or category...).
     */
    public function urlable()
    {
        return $this->morphTo();
    }
}
