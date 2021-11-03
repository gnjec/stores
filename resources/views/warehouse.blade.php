@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Product</h2>
            <p style="margin-top:-20px;">from store: <a href="{{ url('/' . $store->base_url) }}">{{ $store->name }}</a>
                - {{ $store->code }}</p>
            <div class="actions">
                <form class="remove" action="{{ url('/' . $store->base_url . '/' . $product->url->path . '/remove') }}"
                    method="post">
                    @csrf
                    <input type="submit" value="Remove from store">
                </form>
            </div>
            <div class="product">
                <h3>{{ $product->name }}</h3>
                <div>{{ $product->sku }}</div>
                <div>{{ $product->description }}</div>
                <div>{{ $product->price }}</div>
            </div>
        </div>
    </div>
@endsection
