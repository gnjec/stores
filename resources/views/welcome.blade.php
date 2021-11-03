@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="head">
            <h2>Stores</h2>
            <div>
                <form action="/stores" method="post">
                    @csrf
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}">

                    <label for="code">Code</label>
                    <input type="text" name="code" value="{{ old('code') }}">

                    <label for="base_url">Base url</label>
                    <input type="text" name="base_url" value="{{ old('base_url') }}">

                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{ old('description') }}">
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
        @if (count($stores))
            <div class="list">
                <ul>
                    @foreach ($stores as $store)
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
