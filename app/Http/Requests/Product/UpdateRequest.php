<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|image',
            'count' => 'required|integer',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'category_id' => 'required|exists:categories,id',
            'group_id' => 'required|exists:groups,id',
            'tags' => 'nullable|array',
            'tags.*' => 'nullable|exists:tags,id',
            'colors' => 'nullable|array',
            'colors.*' => 'nullable|exists:colors,id',
        ];
    }
}
