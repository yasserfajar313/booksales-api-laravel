<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // READ
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Author::all()
        ], 200);
    }

    // CREATE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $author = Author::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Author berhasil ditambahkan',
            'data' => $author
        ], 201);
    }
}
