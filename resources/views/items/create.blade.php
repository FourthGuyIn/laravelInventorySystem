<!-- resources/views/items/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Create Item</h1>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Item creation form -->
    <form action="/items" method="post" enctype="multipart/form-data">
        @csrf

        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>

        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea>
        <br>

        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>
        <br>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" required>
        <br>

        <label for="SKU">SKU:</label>
        <input type="text" name="SKU" id="SKU" required>
        <br>

        <label for="picture">Picture:</label>
        <input type="file" name="picture" id="picture" required>
        <br>

        <button type="submit">Create</button>
    </form>
@endsection