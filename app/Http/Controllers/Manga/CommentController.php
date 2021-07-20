<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manga\CommentRequest;
use App\Models\Manga\Comment;
use App\Models\Manga\Manga;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentRequest $request, Manga $manga)
    {
        $comment = new Comment($request->validated());

        $comment->manga()->associate($manga);
        $comment->user()->associate(auth()->user());

        $comment->save();

        return back();
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
