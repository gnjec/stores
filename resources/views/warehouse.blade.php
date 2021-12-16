@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Product</h2>
            <p style="margin-top:-20px;">from store: <a href="{{ url('/' . $store->base_url) }}">{{ $store->name }}</a>
                - {{ $store->code }}</p>
            <div class="actions">
                <form class="remove" action="{{ url('/' . $store->base_url . '/' . $url->path . '/remove') }}"
                    method="post">
                    @csrf
                    <input type="submit" value="Remove from store">
                </form>
            </div>
            <div class="product">
                <h3>{{ $url->urlable->name }}</h3>
                <div>{{ $url->urlable->sku }}</div>
                <div>{{ $url->urlable->description }}</div>
                <div>{{ $url->urlable->price }}</div>
            </div>
        </div>
    </div>
@endsection
