<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:2',
            'body' => ['required','string','min:5'],
            // validating an array of tags (optional)
            // 'tags' => 'array',
            // 'tags.*' => 'string|min:2',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is Required',
            'body.required' => 'Body is Required',
            'title.min' => 'Title must be at least :min characters',
            'body.min' => 'Body must be at least :min characters',
            'title.string' => 'Title must be a string',
            'body.string' => 'Body must be a string',
        ];
    }
}
