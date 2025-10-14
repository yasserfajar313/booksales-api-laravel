<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run(): void
    {
        $genres = [
            ['name' => 'Action', 'description' => 'Genre penuh aksi dan petualangan.'],
            ['name' => 'Romance', 'description' => 'Genre tentang kisah cinta dan hubungan.'],
            ['name' => 'Horror', 'description' => 'Genre yang menegangkan dan menakutkan.'],
            ['name' => 'Comedy', 'description' => 'Genre yang penuh humor dan hiburan.'],
            ['name' => 'Fantasy', 'description' => 'Genre dengan dunia imajinatif dan sihir.'],
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
