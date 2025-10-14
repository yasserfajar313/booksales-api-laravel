<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $authors = [
            ['name' => 'J.K. Rowling', 'country' => 'UK', 'biography' => 'Penulis novel Harry Potter.'],
            ['name' => 'George R.R. Martin', 'country' => 'USA', 'biography' => 'Penulis A Song of Ice and Fire.'],
            ['name' => 'Agatha Christie', 'country' => 'UK', 'biography' => 'Penulis novel detektif terkenal.'],
            ['name' => 'Stephen King', 'country' => 'USA', 'biography' => 'Penulis genre horor dan thriller.'],
            ['name' => 'Haruki Murakami', 'country' => 'Japan', 'biography' => 'Penulis novel modern Jepang.'],
        ];

        foreach ($authors as $author) {
            Author::create($author);
        }
    }
}
