<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Create Item</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ url('/items') }}" enctype="multipart/form-data">
        @csrf
        <label for="category_id">Category:</label>
        <select name="category_id" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <br>
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ old('title') }}" required>
        <br>
        <!-- Add other fields (description, price, quantity, SKU, picture) here -->
        <br>
        <button type="submit">Create Item</button>
    </form>
@endsection