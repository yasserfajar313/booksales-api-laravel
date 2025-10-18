<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // READ
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'data' => Genre::all()
        ], 200);
    }

    // CREATE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'genre_name' => 'required|string|max:100'
        ]);

        $genre = Genre::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Genre berhasil ditambahkan',
            'data' => $genre
        ], 201);
    }
}
