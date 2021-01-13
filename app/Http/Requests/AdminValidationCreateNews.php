<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminValidationCreateNews extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules()
    {
        return [
            'title' => 'required|min:10|max:255|unique:news',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id|integer',
            'source_id' => 'required|exists:sources,id|integer',
            'active' => 'boolean',
            'publish_date' => 'date'
        ];
    }

    public function attributes()
    {
        return
        [
            'title' => 'Название новости'
        ];
    }
}


