<?php

namespace Database\Seeders;

use App\Models\Manga\Genre;
use App\Models\Manga\Manga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MangaSeeder extends Seeder
{
    public function run()
    {
        //region bleach
        $shounen = Genre::query()->find(1);

        $manga = new Manga();
        $manga->title = 'bleach';
        $manga->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, velit.';
        $manga->genre()->associate($shounen->id);
        $manga->image_path = 'public/forSeeds/bleach.jpg';

        $manga->save();
        //endregion

        //region blame
        $scince = Genre::query()->find(2);

        $manga = new Manga();
        $manga->title = 'blame';
        $manga->description = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, velit.';
        $manga->genre()->associate($scince->id);
        $manga->image_path = 'public/forSeeds/blame.jpg';

        $manga->save();
        //endregion
    }
}
