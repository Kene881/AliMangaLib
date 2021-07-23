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
            ->latest()
            ->paginate();

        return view('news.news.index', [
            'news' => $news
        ]);
    }

    public function show(News $news)
    {
        return view('news.news.show', [
            'news' => $news
        ]);
    }
}
