<!-- edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Edit Category</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ url("/categories/{$category->id}") }}">
        @csrf
        @method('PATCH')
        <label for="name">Category Name:</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
        <button type="submit">Update Category</button>
    </form>
@endsection