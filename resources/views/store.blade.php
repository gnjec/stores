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

        li {
            border-radius: 2px;
            background-color: darkseagreen;
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

    </style>
</head>

<body class="antialiased">

    <div class="head">
        <h3><a href="{{ url('/') }}">Home</a></h3>
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



    <div class=container>

        {{-- <div>
            <form action="/stores" method="post">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name" value="">

                <label for="code">Code</label>
                <input type="text" name="code" value="">

                <label for="base_url">Base url</label>
                <input type="text" name="base_url" value="">

                <label for="description">Description</label>
                <input type="text" name="description" value="">
                <br>
                <input type="submit" value="Submit">
            </form>
        </div> --}}

        {{-- <div class="list">
            <ul>
                @foreach ($stores as $store)
                    <li>
                        <h3>{{ $store->name }}</h3>
                        <div>{{ $store->code }}</div>
                        <div>{{ $store->base_url }}</div>
                        <div>{{ $store->description }}</div>
                    </li>
                @endforeach
            </ul>
        </div> --}}
    </div>
</body>

</html>
