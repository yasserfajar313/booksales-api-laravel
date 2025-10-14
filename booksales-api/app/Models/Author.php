<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public static function getAll()
    {
        return [
            ['id' => 1, 'name' => 'J.K. Rowling'],
            ['id' => 2, 'name' => 'Stephen King'],
            ['id' => 3, 'name' => 'Isaac Asimov'],
            ['id' => 4, 'name' => 'Agatha Christie'],
            ['id' => 5, 'name' => 'George Orwell']
        ];
    }
}
