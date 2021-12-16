<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function show(Store $store, Url $url)
    {
        return view('warehouse', ['url' => $url, 'store' => $store]);
    }

    public function add(Store $store)
    {
        return view('warehouse-add', ['store' => $store, 'products' => Product::all()]);
    }

    public function adding(Request $request, Store $store)
    {
        $request->validate([
            'product' => 'required|numeric'
        ]);

        if (Product::find($request->product) && !$store->products->find($request->product)) {
            $store->products()->attach($request->product);
        }

        return redirect($store->base_url . '/add');
    }

    public function create(Store $store)
    {
        return view('warehouse-create', ['store' => $store]);
    }

    public function creating(Request $request, Store $store)
    {
        $request->validate([
            'name' => 'required|string',
            'sku' => 'required|alpha_num|unique:products',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'slug' => 'nullable|alpha_num'
        ]);

        $product = Product::create($request->all());

        $product->stores()->attach($store);

        return back();
    }

    public function remove(Store $store, Url $url)
    {
        $product = $url->urlable;
        $product->stores()->detach($store->id);

        return redirect('/' . $store->base_url);
    }
}
