<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: "Nunito", sans-serif;
            display: flex;
            flex-direction: column;
            background-color: gainsboro;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 200px;
        }

        input {
            border-style: solid;
            border-radius: 2px;
        }

        button {
            border-style: solid;
            border-radius: 2px;
            margin-right: 4px;
        }

        ul {
            width: 300px;
            padding: 0px;
            list-style-type: none;
        }

        .product {
            border-radius: 2px;
            background-color: white;
            padding: 10px;
            margin: 10px;
        }

        .store {
            border-radius: 2px;
            background-color: deepskyblue;
            padding: 10px;
            margin: 10px;
        }

        .container {
            display: flex;
            margin: auto;
        }

        .list {
            margin-left: 20px;
        }

        .head {
            margin-bottom: 40px;
        }

        .menu {
            display: flex;
            justify-content: center;
        }

        .menu h3 {
            padding: 10px;
        }

    </style>
</head>

<body class="antialiased">
    <div class="menu">
        <h3><a href="{{ url('/') }}">Stores</a></h3>
        <h3><a href="{{ url('/products') }}">Products</a></h3>
    </div>
    <h2>Edit Product</h2>
    <div class="container">
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
</body>

</html>
