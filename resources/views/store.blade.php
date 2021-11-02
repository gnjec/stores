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

        .delete {
            margin-top: 1px;
            width: 80px;
        }

        .delete input {
            background-color: wheat;
            color: red;
        }

        .actions {
            display: flex;
            justify-content: center;
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
    <div class="container">
        <div class="head">
            <h2>Store</h2>
            <div class="actions">
                <a href="{{ url($store->base_url . '/edit') }}"><button>Edit</button></a>
                <form class="delete" action="{{ url($store->base_url . '/delete') }}" method="post">
                    @csrf
                    <input type="submit" value="Delete">
                </form>
            </div>
            <h3>{{ $store->name }}</h3>
            <div>{{ $store->code }}</div>
            <div>{{ $store->base_url }}</div>
            <div>{{ $store->description }}</div>
        </div>

        @if (count($products))
            <div class="list">
                <h4>Has products:</h4>
                <ul>
                    @foreach ($products as $product)
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
</body>

</html>