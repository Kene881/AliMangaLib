<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\NewsRequest;
use App\Models\News\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()
            ->paginate();

        return view('news.news.index', [
            'news' => $news
        ]);
    }

    public function create()
    {
        return view('news.news.form');
    }

    public function store(NewsRequest $request)
    {
        $news = News::query()
            ->create($request->validated());

        return redirect()->route('news.news.show', $news);
    }

    public function show(News $news)
    {
        return view('news.news.show', [
            'news' => $news
        ]);
    }

    public function edit(News $news)
    {
        return view('news.news.form', [
            'news' => $news,
        ]);
    }

    public function update(NewsRequest $request, News $news)
    {
        $news->update($request->validated());

        return redirect()->route('news.news.show', $news);
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.news.index');
    }
}
