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
            'sku' => 'required|alpha_num|unique:products',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'slug' => 'nullable|alpha_num',
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
        $product = Url::product($path);
        return view('product', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($path)
    {
        $product = Url::product($path);
        return view('product-edit', ['product' => $product, 'stores' => Store::all()]);
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
            'name' => 'required|string',
            'sku' => 'required|alpha_num',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'slug' => 'nullable|alpha_num',
            'store' => 'nullable|numeric'
        ]);

        $product = Url::product($path);

        $product->update($request->all());

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
    public function destroy($path)
    {
        $product = Url::product($path);
        $product->stores()->detach();
        $product->delete();
        $product->url->delete();

        return redirect('/products');
    }
}
