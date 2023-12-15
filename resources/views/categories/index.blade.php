<!-- index.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Categories</h2>
    <a href="{{ url('/categories/create') }}">Add New Category</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ url("/categories/{$category->id}/edit") }}">Edit</a>
                        <!-- Add delete link here -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection