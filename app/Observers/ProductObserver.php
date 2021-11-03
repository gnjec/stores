<?php

namespace App\Observers;

use App\Models\Url;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductObserver
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the Product "created" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function created(Product $product)
    {
        global $request;

        $path = Url::path($request->slug, $request->sku);

        $url = new Url;
        $url->path = $path;
        $product->url()->save($url);
    }

    /**
     * Handle the Product "saved" event.
     *
     * @param  \App\Models\Product  $product
     * @return void
     */
    public function saved(Product $product)
    {
        global $request;

        if ($product->url && $request->slug !== $product->url->path) {
            $product->url->delete();

            $path = Url::path($request->slug, $request->sku);
            $url = new Url;
            $url->path = $path;
            $product->url()->save($url);
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
