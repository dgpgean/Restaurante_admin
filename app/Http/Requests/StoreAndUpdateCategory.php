<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAndUpdateCategory extends FormRequest
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
            'name' => ['required', 'min:3', 'unique:categories'],

        ];

        if ($this->method() == 'PUT') {
            $rules = [
                'name' => ['required', 'min:3', Rule::unique('categories')->ignore($this->id)],
            ];
        }
        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome da categoria é obrigatório',
            'name.unique' => 'Já existe uma categoria com esse nome.',
        ];
    }
}
