@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Edit Store</h2>
            <div>
                <form action="{{ url($store->base_url . '/update') }}" method="post">
                    @csrf
                    <label for="product">Add product:</label>
                    <select name="product">
                        <option value="">- or leave empty -</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} - {{ $product->sku }}</option>
                        @endforeach
                    </select>

                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $store->name }}">

                    <label for="code">Code</label>
                    <input type="text" name="code" value="{{ $store->code }}">

                    <label for="base_url">Base url</label>
                    <input type="text" name="base_url" value="{{ $store->base_url }}">

                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{ $store->description }}">
                    <br>
                    <input type="submit" value="Update">
                </form>
            </div>
        </div>
        @if (count($store->products))
            <div class="list">
                <h4>Has products:</h4>
                <ul>
                    @foreach ($store->products as $product)
                        <li class="product">
                            <a href="{{ url('/' . $store->base_url . $product->url->path) }}">
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
