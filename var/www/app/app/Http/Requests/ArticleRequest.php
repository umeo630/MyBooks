<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'article_title' => 'required|max:50',
            'book_title' => 'required|max:50',
            'book_content' => 'required|max:500',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'book_title' => '本のタイトル',
            'body' => '本文',
        ];
    }
}
