<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminValidationUserForm extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:10',
            'email' => 'email|unique:users,email',
            'password' => 'string|min:3',
            'current_password' => 'string|min:3',
            'isAdmin' => 'boolean',
        ];
    }
}
