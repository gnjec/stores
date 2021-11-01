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

    </style>
</head>

<body class="antialiased">
    <h3><a href="{{url('/')}}">Home</a></h3>
    <h2>Edit Store</h2>
    <div class=container>
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
            </form>
        </div>
    </div>
</body>

</html>
