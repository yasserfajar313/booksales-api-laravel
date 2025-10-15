<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'genre_id'];

    // Relasi ke Author
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Relasi ke Genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
