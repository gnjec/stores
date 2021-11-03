@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Add Product</h2>
            <p style="margin-top:-20px;">to store: <a href="{{ url('/' . $store->base_url) }}">{{ $store->name }}</a>
                - {{ $store->code }}</p>
            <div>
                <form action="{{ url($store->base_url . '/adding') }}" method="post">
                    @csrf
                    <label for="product">Add product:</label>
                    <select name="product">
                        <option value="">- choose -</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product') == $product->id ? 'selected' : '' }}>
                                {{ $product->name }} - {{ $product->sku }}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="submit" value="Add">
                    @if ($errors->any())
                        <div class="error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>* {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </form>
            </div>
        </div>
        @if (count($store->products))
            <div class="list">
                <h4>Has products:</h4>
                <ul>
                    @foreach ($store->products as $product)
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
