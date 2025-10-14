<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public static function getAll()
    {
        return [
            ['id' => 1, 'name' => 'Fiction'],
            ['id' => 2, 'name' => 'Science'],
            ['id' => 3, 'name' => 'Romance'],
            ['id' => 4, 'name' => 'Fantasy'],
            ['id' => 5, 'name' => 'Horror']
        ];
    }
}
