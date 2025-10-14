<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        $books = [
            ['title' => 'Laravel Basics', 'author' => 'Taylor Otwell'],
            ['title' => 'Mastering PHP', 'author' => 'John Doe'],
            ['title' => 'Web Development 101', 'author' => 'Jane Smith']
        ];

        return view('books', compact('books'));
    }
}

