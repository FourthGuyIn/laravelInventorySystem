<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Create Category</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ url('/categories') }}">
        @csrf
        <label for="name">Category Name:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        <button type="submit">Create Category</button>
    </form>
@endsection