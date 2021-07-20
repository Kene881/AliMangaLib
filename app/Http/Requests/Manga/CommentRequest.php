<?php

namespace App\Http\Requests\Manga;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'content' => ['required', 'min:10']
        ];
    }
}
