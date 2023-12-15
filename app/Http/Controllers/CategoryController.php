<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 


class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create($request->all());

        return redirect('/categories')->with('success', 'Category added successfully.');
    }

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id,
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect('/categories')->with('success', 'Category updated successfully.');
    }
}