<!-- index.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Items</h2>
    <a href="{{ url('/items/create') }}">Add New Item</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td>
                        <a href="{{ url("/items/{$item->id}/edit") }}">Edit</a>
                        <a href="{{ url("/items/{$item->id}/delete") }}" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection