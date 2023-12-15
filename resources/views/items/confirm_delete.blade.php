<!-- confirm_delete.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Confirm Delete Item</h2>
    <p>Are you sure you want to delete this item?</p>
    <form method="post" action="{{ url("/items/{$item->id}") }}">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
        <a href="{{ url('/items') }}">Cancel</a>
    </form>
@endsection