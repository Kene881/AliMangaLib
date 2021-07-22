<?php

namespace App\Http\Controllers\Manga;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manga\CommentRequest;
use App\Models\Comment;
use App\Models\Manga\Manga;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = new Comment($request->validated());

        $comment->user()->associate(auth()->user());
        $manga = Manga::find($request->get('manga_id'));
        $manga->comments()->save($comment);

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }

    public function replyStore(CommentRequest $request, Comment $comment)
    {
        $reply = new Comment($request->validated());

        $reply->user()->associate(auth()->user());
        $reply->comment()->associate($comment->comment);
        $comment->replies()->save($reply);

        return back();
    }
}
