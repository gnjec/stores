<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products', ['products' => $products, 'stores' => Store::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'sku' => 'required|string|unique:products',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'slug' => 'nullable|string',
            'store' => 'nullable|numeric'
        ]);

        $product = Product::create($request->all());

        if ($request->store && Store::find($request->store) && !$product->stores->find($request->store)) {
            $product->stores()->attach($request->store);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($path)
    {
        $url = Url::where('path', '/' . $path)->firstOrFail();
        return view('product', ['product' => $url->urlable]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($path)
    {
        $url = Url::where('path', '/' . $path)->firstOrFail();
        return view('product-edit', ['product' => $url->urlable, 'stores' => Store::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $path)
    {
        $request->validate([
            'name' => 'string',
            'sku' => 'string',
            'price' => 'numeric',
            'description' => 'nullable|string',
            'slug' => 'nullable|string',
            'store' => 'nullable|numeric'
        ]);

        $url = Url::where('path', '/' . $path)->firstOrFail();

        $product = $url->urlable;

        $product->update($request->all());

        if ($request->store && Store::find($request->store) && !$product->stores->find($request->store)) {
            $product->stores()->attach($request->store);
        }

        $urlPath = $request->slug ??= $product->sku;

        return redirect('/product/' . $urlPath);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($path)
    {
        $url = Url::where('path', '/' . $path)->firstOrFail();
        $url->urlable->stores()->detach();
        $url->urlable->delete();
        $url->delete();

        return redirect('/products');
    }
}
