<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAndUpdateProduct extends FormRequest
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
        $rules = [
            'name' => ['required', 'min:3', 'unique:products'],
            'price' => ['required'],
            'image' => ['image', 'mimes:jpeg,jpg,png']
        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'name' => ['required', 'min:3', Rule::unique('products')->ignore($this->id)],
            ];
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome do produto é obrigatório',
            'name.unique' => 'Esse nome de produto já está em uso',
            'price.required' => 'O preço do produto é obrigatório',
        ];
    }
}
