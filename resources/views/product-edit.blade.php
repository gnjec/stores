@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="head">
            <h2>Edit Product</h2>
            <p style="margin-top:-20px;"><a href="{{ url('/product/' . $product->url->path) }}">{{ $product->name }}</a>
                - {{ $product->sku }}</p>
            <div>
                <form action="{{ url('/product/' . $product->url->path . '/update') }}" method="post">
                    @csrf
                    <label for="store">Add to store:</label>
                    <select name="store">
                        <option value="">- or leave empty -</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}" {{ old('store') == $store->id ? 'selected' : '' }}>{{ $store->name }} - {{ $store->code }}</option>
                        @endforeach
                    </select>

                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') ?: $product->name }}">

                    <label for="sku">Sku</label>
                    <input type="text" name="sku" value="{{ old('sku') ?: $product->sku }}">

                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{ old('price') ?: $product->price }}">

                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{ old('description') ?: $product->description }}">

                    <label for="slug">Slug</label>
                    <input type="text" name="slug" value="{{ old('slug') ?: $product->url->path }}">
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
