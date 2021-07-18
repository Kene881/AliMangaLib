<?php

namespace App\Http\Requests\Manga;

use Illuminate\Foundation\Http\FormRequest;

class ChapterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'path_to_images' => ['nullable']
        ];
    }
}
