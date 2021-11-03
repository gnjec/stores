@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Store</h2>
            <p style="margin-top:-20px;"><a href="{{ url('/' . $store->base_url) }}">{{ $store->name }}</a>
                - {{ $store->code }}</p>
            <div class="actions">
                <a href="{{ url($store->base_url . '/edit') }}"><button>Edit</button></a>
                <form class="delete" action="{{ url($store->base_url . '/delete') }}" method="post">
                    @csrf
                    <input type="submit" value="Delete">
                </form>
            </div>
            <div class="actions">
                <a href="{{ url($store->base_url . '/add') }}"><button class="add">Add Product</button></a>
                <a href="{{ url($store->base_url . '/create') }}"><button class="create">Create Product</button></a>
            </div>
            <br>
            <code>description:</code>
            <br>
            <code>{{ $store->description }}</code>
        </div>

        @if (count($products))
            <div class="list">
                <h4>Has products:</h4>
                <ul>
                    @foreach ($products as $product)
                        <li class="product">
                            <a href="{{ url('/' . $store->base_url . '/' . $product->url->path) }}">
                                <h3>{{ $product->name }}</h3>
                            </a>
                            <div>{{ $product->sku }}</div>
                            <div>{{ $product->description }}</div>
                            <div>{{ $product->price }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
