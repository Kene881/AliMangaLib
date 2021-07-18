<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manga\ChapterRequest;
use App\Models\Manga\Chapter;
use App\Models\Manga\Manga;
use Illuminate\Support\Facades\Storage;

class ChapterController extends Controller
{
    public function index(Manga $manga)
    {
        $chapters = Chapter::query()
            ->where('manga_id', $manga->id)
            ->get();

        return view('pages.manga.chapter.index',[
            'chapters' => $chapters,
            'manga' => $manga
        ]);
    }

    public function create(Manga $manga)
    {
        return view('pages.manga.chapter.form', [
            'manga' => $manga
        ]);
    }

    public function store(ChapterRequest $request)
    {
        $data = $request->validated();
        $chapter = Chapter::query()
            ->create($data);

        $chapter->manga()->associate($request->manga_id);
        $this->uploadImages($chapter, $data);
        $chapter->save();

        return redirect()->route('chapter.index', $chapter->manga);
    }

    public function show(Chapter $chapter)
    {
        $path = $chapter->path_to_images;
        $images_path = Storage::files($path);

        return view('pages.manga.chapter.show', [
            'chapter' => $chapter,
            'images_path' => $images_path
        ]);
    }

    public function edit(Chapter $chapter)
    {
        return view('pages.manga.chapter.form', [
            'chapter' => $chapter
        ]);
    }

    public function update(ChapterRequest $request, Chapter $chapter)
    {
        //
    }

    public function destroy(Chapter $chapter)
    {
        //
    }

    function uploadImages(Chapter $chapter, $data) {
        $path = "public/manga/{$chapter->manga->title}/{$chapter->name}";
        Storage::makeDirectory($path);

        $files = $data['path_to_images'];

        for($i = 0; $i < count($files); $i++){
            $extension = $files[$i]->getClientOriginalExtension();
            $files[$i]->storeAs($path, "{$i}.{$extension}");
        }

        $this->removeImage($chapter);
        $chapter->path_to_images = $path;
        $chapter->save();
    }

    function removeImage(Chapter $chapter): bool {
        if (!$chapter->path_to_images)
            return false;
        return Storage::delete($chapter->path_to_images);
    }
}
