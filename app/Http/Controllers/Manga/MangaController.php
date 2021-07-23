<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manga\MangaRequest;
use App\Models\Manga\Genre;
use App\Models\Manga\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MangaController extends Controller
{
    public function index()
    {
        $mangas = Manga::query()
            ->get();
        $genres = Genre::all();

        return view('pages.manga.index', [
            'mangas' => $mangas,
            'genres' => $genres
        ]);
    }

    public function show(Manga $manga)
    {
        return view('pages.manga.show', [
            'manga' => $manga
        ]);
    }
}
