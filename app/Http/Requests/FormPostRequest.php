<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array {
        return [
            'title' => ['required', 'min:3'],
            'content' => ['required'],
            'slug' => ['required', 'min:8', 'regex:/^[a-z0-9\-]+$/', Rule::unique('posts')->ignore($this->route()->parameter('post'))],
            'category_id' => ['required', 'exists:categories,id'],
            'tags' => ['required', 'array', 'exists:tags,id'],
            'image' => ['image', 'max:2048'],
        ];
    }

    public function prepareForValidation(): void {
        $this->merge([
            'slug' => $this->input('slug') ?: \Str::slug($this->input('title')),
        ]);
    }
}
