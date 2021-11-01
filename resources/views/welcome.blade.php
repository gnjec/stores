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

    </style>
</head>

<body class="antialiased">
    <h2>Stores</h2>
    <div class=container>
        <div>
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
                <input type="submit" value="Create">
            </form>
        </div>
        <div class="list">
            <ul>
                @foreach ($stores as $store)
                    <li>
                        <code>{{ $store->code }}</code>
                        <a href="{{ url($store->base_url) }}">
                            <h3>{{ $store->name }}</h3>
                        </a>
                        {{-- <div>{{ $store->base_url }}</div> --}}
                        <div>{{ $store->description }}</div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
