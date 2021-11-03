@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Create Product</h2>
            <p style="margin-top:-20px;">in store: <a href="{{ url('/' . $store->base_url) }}">{{ $store->name }}</a>
                - {{ $store->code }}</p>
            <div>
                <form action="{{ url($store->base_url . '/creating') }}" method="post">
                    @csrf

                    <label for="name">Name</label>
                    <input type="text" name="name" value="">

                    <label for="sku">Sku</label>
                    <input type="text" name="sku" value="">

                    <label for="description">Description</label>
                    <input type="text" name="description" value="">

                    <label for="price">Price</label>
                    <input type="text" name="price" value="">

                    <label for="slug">Slug</label>
                    <input type="text" name="slug" value="">
                    <br>
                    <input type="submit" value="Create">
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
