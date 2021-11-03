<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('welcome', ['stores' => $stores]);
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
            'code' => 'required|alpha_num|unique:stores',
            'base_url' => 'required|alpha_num|unique:stores',
            'description' => 'nullable|string'
        ]);

        Store::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('store', ['store' => $store, 'products' => $store->products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('store-edit', ['store' => $store, 'products' => Product::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'name' => 'required|string',
            'code' => 'required|alpha_num',
            'base_url' => 'required|alpha_num',
            'description' => 'nullable|string',
            'product' => 'nullable|numeric'
        ]);

        $store->update($request->all());

        if ($request->product && Product::find($request->product) && !$store->products->find($request->product)) {
            $store->products()->attach($request->product);
        }

        return redirect($store->base_url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $store->products()->detach();
        $store->delete();

        return redirect('/');
    }
}
