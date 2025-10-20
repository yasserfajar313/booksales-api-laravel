<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // READ ALL
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

    // SHOW
    public function show($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Author tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $author
        ], 200);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Author tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:100'
        ]);

        $author->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Author berhasil diperbarui',
            'data' => $author
        ], 200);
    }

    // DESTROY
    public function destroy($id)
    {
        $author = Author::find($id);
        if (!$author) {
            return response()->json([
                'status' => 'error',
                'message' => 'Author tidak ditemukan'
            ], 404);
        }

        $author->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Author berhasil dihapus'
        ], 200);
    }
}
