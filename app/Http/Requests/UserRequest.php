<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function rules()
    {
        $uniqueName = Rule::unique((new User())->getTable(), 'name');

        if ($user = $this->route('user'))
            $uniqueName->ignoreModel($user);

        return [
            'avatar_path' => ['nullable'],
            'name' => ['string', 'max:255', $uniqueName, 'required'],
            'email' => ['string', 'required'],
            'sex' => ['string', 'required'],
            'about' => ['nullable']
        ];
    }
}
