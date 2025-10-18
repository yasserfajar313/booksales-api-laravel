<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'title' => "Harry Potter and the Sorcerer's Stone",
                'author_id' => 1, // J.K. Rowling
                'genre_id' => 5,  // Fantasy
                'year' => 1997
            ],
            [
                'title' => "A Game of Thrones",
                'author_id' => 2, // George R.R. Martin
                'genre_id' => 5,  // Fantasy
                'year' => 1996
            ],
            [
                'title' => "Murder on the Orient Express",
                'author_id' => 3, // Agatha Christie
                'genre_id' => 2,  // Romance 
                'year' => 1934
            ],
            [
                'title' => "The Shining",
                'author_id' => 4, // Stephen King
                'genre_id' => 3,  // Horror
                'year' => 1977
            ],
            [
                'title' => "Kafka on the Shore",
                'author_id' => 5, // Haruki Murakami
                'genre_id' => 4,  // Comedy 
                'year' => 2002
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
