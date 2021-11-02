@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Products</h2>
            <div>
                <form action="/products" method="post">
                    @csrf
                    <label for="store">Choose a store:</label>
                    <select name="store">
                        <option value="">- or leave empty -</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->name }} - {{ $store->code }}</option>
                        @endforeach
                    </select>

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
                </form>
            </div>
        </div>
        <div class="list">
            <ul>
                @foreach ($products as $product)
                    <li class="product">
                        <code>{{ $product->sku }}</code>
                        <a href="{{ url('/product' . $product->url->path) }}">
                            <h3>{{ $product->name }}</h3>
                        </a>
                        <div>{{ $product->description }}</div>
                        <div>{{ $product->price }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
