<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;

class ItemController extends Controller
{
    public function create()
    {
        // Retrieve categories from the database to populate the dropdown in the form
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'SKU' => 'required|unique:items,SKU',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle file upload and store the item
        $imagePath = $request->file('picture')->store('images', 'public');

        Item::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'SKU' => $request->SKU,
            'picture' => $imagePath,
        ]);

        return redirect('/items')->with('success', 'Item added successfully.');
    }

    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'SKU' => 'required|unique:items,SKU,' . $id,
        ]);

        $item = Item::findOrFail($id);

        // If a new picture is uploaded, update the picture path
        if ($request->hasFile('picture')) {
            $request->validate([
                'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('picture')->store('images', 'public');
            $item->update(['picture' => $imagePath]);
        }

        $item->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'SKU' => $request->SKU,
        ]);

        return redirect('/items')->with('success', 'Item updated successfully.');
    }

    public function confirmDelete($id)
    {
        $item = Item::findOrFail($id);
        return view('items.confirm_delete', compact('item'));
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        // Delete the image from the images folder
        Storage::delete('public/' . $item->picture);

        // Soft delete the item
        $item->delete();

        return redirect('/items')->with('success', 'Item deleted successfully.');
    }
}