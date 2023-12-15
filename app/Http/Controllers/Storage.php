<?php
//storage controleler

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function store(Request $request)
    {
        if($request->hasFile('file')) {
            $path = $request->file('file')->store('public/files');
            return response()->json(['path' => $path], 200);
        }

        return response()->json(['error' => 'No file provided'], 400);
    }

    public function download($filename)
    {
        return Storage::download('public/files/' . $filename);
    }

    public function delete($filename)
    {
        Storage::delete('public/files/' . $filename);
        return response()->json(['message' => 'File deleted'], 200);
    }
}
