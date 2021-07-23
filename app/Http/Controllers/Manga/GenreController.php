<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manga\GenreRequest;
use \App\Models\Manga\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::query()
            ->get();

        return view('pages.manga.genre.index', [
            'genres' => $genres
        ]);
    }

    public function create()
    {
        return view('pages.manga.genre.form');
    }

    public function store(GenreRequest $request)
    {
        Genre::query()->create($request->validated());

        return redirect()->route('genre.index');
    }

    public function show(Genre $genre)
    {
        return view('pages.manga.genre.index', [
            'genre' => $genre
        ]);
    }

    public function edit(Genre $genre)
    {
        return view('pages.manga.genre.form', [
            'genre' => $genre
        ]);
    }

    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());

        $genres = Genre::query()
            ->get();

        return view('pages.manga.genre.index', [
            'genres' => $genres
        ]);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return redirect()->route('genre.index');
    }
}
