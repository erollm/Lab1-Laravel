<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovie extends FormRequest
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
            'title' => ['required', 'unique:movies,title'],
            'backdrop_path' => ['required'],
            'trending' => ['required'],
            'poster_path' => ['required'],
            'length' => ['required'],
            'date' => ['required'],
            'description' => ['required'],
            'trailer' => ['nullable'],
            'thumbnail' => ['nullable'],
            'website_name' => ['nullable'],
            'website_url' => ['nullable']
        ];
    }
}
