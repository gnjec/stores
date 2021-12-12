<?php

namespace App\Observers;

use App\Models\Url;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductObserver
{
    public function __construct(protected Request $request)
    {
    }

    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        $product->url()->update([
            'path' => Url::path($this->request->slug, $this->request->sku)
        ]);
    }

    /**
     * Handle the Product "saved" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function saved(Product $product)
    {
        if ($product->url && $this->request->slug !== $product->url->path) {
            $product->url()->update([
                'path' => Url::path($this->request->slug, $this->request->sku)
            ]);
        }
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function restored(Product $product)
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function forceDeleted(Product $product)
    {
        //
    }
}
