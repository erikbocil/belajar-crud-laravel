<?php

namespace App\Http\Requests;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Book;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'slug' => 'string',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => SlugService::createSlug(Book::class, 'slug', $this->title)
        ]);
    }
}
