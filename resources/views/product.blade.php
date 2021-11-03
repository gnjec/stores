@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Product</h2>
            <p style="margin-top:-20px;"><a href="{{ url('/product/' . $product->url->path) }}">{{ $product->name }}</a>
                - {{ $product->sku }}</p>
            <div class="actions">
                <a href="{{ url('/product/' . $product->url->path . '/edit') }}"><button>Edit</button></a>
                <form class="delete" action="{{ url('/product/' . $product->url->path . '/delete') }}"
                    method="post">
                    @csrf
                    <input type="submit" value="Delete">
                </form>
            </div>
            <br>
            <div>{{ $product->price }} $</div>
            <br>
            <code>description:</code>
            <br>
            <code>{{ $product->description }}</code>
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
