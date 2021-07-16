<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manga\MangaRequest;
use App\Models\Manga\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MangaController extends Controller
{
    public function index()
    {
        $mangas = Manga::query()
            ->get();

        return view('pages.manga.index', [
            'mangas' => $mangas
        ]);
    }

    public function create()
    {
        return view('pages.manga.form');
    }

    public function store(MangaRequest $request)
    {
        $manga = Manga::query()
            ->create($request->validated());

        $this->uploadImage($manga, $request);
        $manga->save();

        return redirect()->route('manga.index');
    }

    public function show(Manga $manga)
    {
        return view('pages.manga.show', [
            'manga' => $manga
        ]);
    }

    public function edit(Manga $manga)
    {
        return view('pages.manga.form', [
            'manga' => $manga
        ]);
    }

    public function update(MangaRequest $request, Manga $manga)
    {
        $data = $request->validated();

        $manga->update($data);
        $this->uploadImage($manga, $request);

        return redirect()->route('manga.show', $manga);
    }

    public function destroy(Manga $manga)
    {
        $this->removeImage($manga);
        $manga->delete();
        return redirect()->route('manga.index');
    }

    function uploadImage(Manga $manga, MangaRequest $request) {
        if (!$request->hasFile('image_path'))
            return;

        $path = $request->file('image_path')
            ->store('public/manga/'.$manga->title);

        $this->removeImage($manga);
        $manga->fill(['image_path' => $path])->save();
    }

    function removeImage(Manga $manga): bool {
        if (!$manga->image_path)
            return false;
        return Storage::delete($manga->image_path);
    }
}
