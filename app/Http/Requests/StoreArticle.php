<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticle extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id_category'=>"integer",
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'mimes:jpeg,bmp,png,jpg'
        ];
    }
}
