@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="head">
            <h2>Edit Product</h2>
            <div>
                <form action="{{ url('/product' . $product->url->path . '/update') }}" method="post">
                    @csrf
                    <label for="store">Add to store:</label>
                    <select name="store">
                        <option value="">- or leave empty -</option>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->name }} - {{ $store->code }}</option>
                        @endforeach
                    </select>

                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $product->name }}">

                    <label for="sku">Sku</label>
                    <input type="text" name="sku" value="{{ $product->sku }}">

                    <label for="price">Price</label>
                    <input type="text" name="price" value="{{ $product->price }}">

                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{ $product->description }}">

                    <label for="slug">Slug</label>
                    <input type="text" name="slug" value="{{ $product->slug }}">
                    <br>
                    <input type="submit" value="Update">
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
