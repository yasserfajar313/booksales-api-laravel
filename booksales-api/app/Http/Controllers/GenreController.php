<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    // READ ALL
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

    // SHOW
    public function show($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $genre
        ], 200);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'genre_name' => 'required|string|max:100'
        ]);

        $genre->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Genre berhasil diperbarui',
            'data' => $genre
        ], 200);
    }

    // DESTROY
    public function destroy($id)
    {
        $genre = Genre::find($id);
        if (!$genre) {
            return response()->json([
                'status' => 'error',
                'message' => 'Genre tidak ditemukan'
            ], 404);
        }

        $genre->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Genre berhasil dihapus'
        ], 200);
    }
}
