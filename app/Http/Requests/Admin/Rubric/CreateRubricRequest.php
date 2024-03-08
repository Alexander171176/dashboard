<?php

namespace App\Http\Requests\Admin\Rubric;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateRubricRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'url' => [
                'required',
                'string',
                'min:3',
                'max:255',
                'lowercase',
                'regex:/^[a-zA-Z0-9-_]+$/i',
                Rule::unique('rubrics', 'url')->ignore($this->route('rubric')),
            ],
            'image_url' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'meta_title' => ['nullable', 'string', 'min:3', 'max:60'],
            'meta_keywords' => ['nullable', 'string', 'min:3', 'max:200'],
            'meta_desc' => ['nullable', 'string', 'min:3', 'max:160'],
            'sort' => ['nullable', 'integer'],
            'seo_title' => ['nullable', 'string', 'max:160'],
            'seo_alt' => ['nullable', 'string', 'max:160'],
        ];
    }
}
