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
        return view('products', ['products' => Product::with('url')->get(), 'stores' => Store::all()]);
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
        $product = Product::create($request->validate([
            'name' => 'required|string',
            'sku' => 'required|alpha_num|unique:products',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'slug' => 'nullable|alpha_num',
            'store' => 'nullable|numeric'
        ]));

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
    public function show(Url $url)
    {
        return view('product', ['product' => $url->urlable]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Url $url)
    {
        return view('product-edit', ['product' => $url->urlable, 'stores' => Store::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Url $url)
    {
        $product = $url->urlable;

        $product->update($request->validate([
            'name' => 'required|string',
            'sku' => 'required|alpha_num',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'slug' => 'nullable|alpha_num',
            'store' => 'nullable|numeric'
        ]));

        if ($request->store && Store::find($request->store) && !$product->stores->find($request->store)) {
            $product->stores()->attach($request->store);
        }

        return redirect('/product/' . $product->fresh()->url->path);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Url $url)
    {
        $product = $url->urlable;
        $product->stores()->detach();
        $product->delete();
        $url->delete();

        return redirect('/products');
    }
}
