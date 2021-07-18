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
        $one_news = News::query()
            ->create($request->validated());

        return redirect()->route('news.news.show', $one_news);
    }

    public function show(News $one_news)
    {
        return view('news.news.show', [
            'one_news' => $one_news
        ]);
    }

    public function edit(News $one_news)
    {
        return view('news.news.form', [
            'one_news' => $one_news,
        ]);
    }

    public function update(NewsRequest $request, News $one_news)
    {
        $one_news->update($request->validated());

        return redirect()->route('news.news.show', $one_news);
    }

    public function destroy(News $one_news)
    {
        $one_news->delete();
        return redirect()->route('news.news.index');
    }
}
