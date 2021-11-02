@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Product</h2>
            <div class="actions">
                <a href="{{ url('/product' . $product->url->path . '/edit') }}"><button>Edit</button></a>
                <form class="delete" action="{{ url('/product' . $product->url->path . '/delete') }}"
                    method="post">
                    @csrf
                    <input type="submit" value="Delete">
                </form>
            </div>
            <h3>{{ $product->name }}</h3>
            <div>{{ $product->sku }}</div>
            <div>{{ $product->description }}</div>
            <div>{{ $product->price }}</div>
        </div>

        @if (count($product->stores))
            <div class="list">
                <h4>In stores:</h4>
                <ul>
                    @foreach ($product->stores as $store)
                        <li class="store">
                            <code>{{ $store->code }}</code>
                            <a href="{{ url($store->base_url) }}">
                                <h3>{{ $store->name }}</h3>
                            </a>
                            <div>{{ $store->description }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
