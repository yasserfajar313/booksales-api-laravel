<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // READ ALL
    public function index()
    {
        $books = Book::with(['author', 'genre'])->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data buku berhasil diambil',
            'data' => $books
        ], 200);
    }

    // CREATE
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'year' => 'required|integer|min:1000|max:' . date('Y')
        ]);

        $book = Book::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data buku berhasil ditambahkan',
            'data' => $book
        ], 201);
    }

    // SHOW
    public function show($id)
    {
        $book = Book::with(['author', 'genre'])->find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $book
        ], 200);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'year' => 'required|integer|min:1000|max:' . date('Y')
        ]);

        $book->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Data buku berhasil diperbarui',
            'data' => $book
        ], 200);
    }

    // DESTROY
    public function destroy($id)
    {
        $book = Book::find($id);
        if (!$book) {
            return response()->json([
                'status' => 'error',
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        $book->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data buku berhasil dihapus'
        ], 200);
    }
}
