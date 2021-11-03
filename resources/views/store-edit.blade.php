@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Edit Store</h2>
            <p style="margin-top:-20px;"><a href="{{ url('/' . $store->base_url) }}">{{ $store->name }}</a>
                - {{ $store->code }}</p>
            <div>
                <form action="{{ url($store->base_url . '/update') }}" method="post">
                    @csrf

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
