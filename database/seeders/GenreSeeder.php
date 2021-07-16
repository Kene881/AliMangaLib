<?php

namespace Database\Seeders;

use App\Models\Manga\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $shounen = new Genre();
        $shounen->name = 'shounen';
        $shounen->save();

        $scienceFiction = new Genre();
        $scienceFiction->name = 'Science fiction';
        $scienceFiction->save();
    }
}
