<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            ['title' => 'Harry Potter and the Sorcerer\'s Stone', 'author_id' => 1, 'year' => 1997, 'genre' => 'Fantasy'],
            ['title' => 'A Game of Thrones', 'author_id' => 2, 'year' => 1996, 'genre' => 'Fantasy'],
            ['title' => 'Murder on the Orient Express', 'author_id' => 3, 'year' => 1934, 'genre' => 'Mystery'],
            ['title' => 'The Shining', 'author_id' => 4, 'year' => 1977, 'genre' => 'Horror'],
            ['title' => 'Kafka on the Shore', 'author_id' => 5, 'year' => 2002, 'genre' => 'Magical Realism'],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
