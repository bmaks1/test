<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_article'=>"integer",
            'author' => 'required|string|max:255',
            'content' => 'required|string',

        ];
    }
}
