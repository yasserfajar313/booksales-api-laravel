<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Menampilkan semua data buku
    public function index()
    {
        $books = Book::with(['author', 'genre'])->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Data buku berhasil diambil',
            'data' => $books
        ], 200);
    }

    //  Menambahkan data buku baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'genre_id' => 'required|exists:genres,id',
            'year' => 'required|integer|min:1000|max:' . date('Y')
        ]);

        // Simpan ke database
        $book = Book::create($validated);

        // Kembalikan response JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Data buku berhasil ditambahkan',
            'data' => $book
        ], 201);
    }
}
