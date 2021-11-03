@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>All Products</h2>
            <div>
                <form action="/products" method="post">
                    @csrf
                    <label for="store">Choose a store:</label>
                    <select name="store">
                        <option value="">- or leave empty -</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}" {{ old('store') == $store->id ? 'selected' : '' }}>
                                {{ $store->name }} - {{ $store->code }}</option>
                        @endforeach
                    </select>

                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}">

                    <label for="sku">Sku</label>
                    <input type="text" name="sku" value="{{ old('sku') }}">

                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{ old('description') }}">

                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{ old('price') }}">

                    <label for="slug">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug') }}">
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
        @if (count($products))
            <div class="list">
                <ul>
                    @foreach ($products as $product)
                        <li class="product">
                            <code>{{ $product->sku }}</code>
                            <a href="{{ url('/product/' . $product->url->path) }}">
                                <h3>{{ $product->name }}</h3>
                            </a>
                            <div>{{ $product->description }}</div>
                            <div>{{ $product->price }}</div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection
