<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\Store;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function show(Store $store, $path)
    {
        $url = Url::where('path', '/' . $path)->firstOrFail();
        return view('warehouse', ['product' => $url->urlable, 'store' => $store]);
    }

    public function add()
    {
        //
    }

    public function remove(Store $store, $path)
    {
        $url = Url::where('path', '/' . $path)->firstOrFail();
        $url->urlable->stores()->detach($store->id);

        return redirect('/' . $store->base_url);
    }
}
