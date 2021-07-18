<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use App\Models\User;
use Illuminate\Validation\Rule;

class ForumController extends Controller
{


    function index() {
        $forums = Forum::query()
            ->latest()
            ->with('user')
            ->get();

        $user = User::query()
            ->where('id',1)
            ->get();

        return view('forums.index', [
            'forums' => $forums,
            'user' => $user
        ]);
    }

    function create() {
        return view('forums.form');
    }

    function store() {
        $data = request()->validate($this->rules());

        $forum = auth()->user()
            ->forums()
            ->create($data);

        return redirect()->route('forums.show', $forum);
    }

    function show(Forum $forum) {

        return view('forums.show', [
            'forum' => $forum
        ]);
    }

    function edit(Forum $forum) {

        return view('forums.form', [
            'forum' => $forum
        ]);
    }

    function update(Forum $forum) {
        $data = request()->validate($this->rules($forum));

        $forum->update($data);
        return redirect()->route('forums.show', $forum);
    }

    function destroy(Forum $forum) {
        $forum->delete();
        return redirect()->route('forums.index');
    }

    protected function rules(Forum $forum = null): array {
        $uniqueTitle = Rule::unique('forums', 'title');

        if($forum) $uniqueTitle->ignoreModel($forum);

        return [
            'title' => [
                'required',
                'string',
                'max:255',
                $uniqueTitle,
            ],
            'description' => [
                'max:255'
            ],
        ];
    }


}



