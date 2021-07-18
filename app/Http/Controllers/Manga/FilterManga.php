<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Models\Manga\Genre;
use App\Models\Manga\Manga;
use Illuminate\Http\Request;

class FilterManga extends Controller
{
    public function __invoke(Request $request)
    {
        $val = $request->genre_id;
        $mangas = ($val != 'all') ? Manga::query()
                ->where('genre_id', $request->genre_id)
                ->get() : Manga::all();
        $genres = Genre::all();

        return view('pages.manga.index', [
            'mangas' => $mangas,
            'genres' => $genres
        ]);
    }
}
