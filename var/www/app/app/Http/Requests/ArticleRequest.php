<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\Types\Nullable;

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
            'article_title' => 'nullable|max:50',
            'book_title' => 'required|max:50',
            'book_content' => 'required|max:500',
            'book_evaluation' => 'required|between:1,5',
            'photo' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function attributes()
    {
        return [
            'article_title' => 'タイトル',
            'book_title' => '本のタイトル',
            'book_content' => '本文',
            'book_evaluation' => '評価',
            'photo' => '画像',
        ];
    }
}
