<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMarcaRequest extends FormRequest
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
            'nome' => [
                'required',
                'min:3',
                'max:255',
                'unique:marcas'
            ],
            'fabricante' => [
                'nullable',
            ],
        ];

        if($this->method() === 'PATCH' || $this->method() === 'PUT'){

            $rules['nome'] = [
                'nullable',
            ];

        }

        return $rules;
    }
}
