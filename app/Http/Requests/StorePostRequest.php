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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            // 'user_id' => 'required',
            'body' => 'required',
            'description' => 'nullable',
            'title' => 'required',
            'categories_id' =>  'required|array|min:1',
            'categories_id.*' => 'required|exists:categories,id',
        ];
    }
}
