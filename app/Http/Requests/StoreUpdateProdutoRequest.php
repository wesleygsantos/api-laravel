<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProdutoRequest extends FormRequest
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
                'unique:produtos'
            ],
            'valor' => [
                'required',
            ],
            'id_marca' => [
                'nullable',
            ],
            'estoque' => [
                'nullable',
            ],
            'id_cidade' => [
                'required',
            ]
        ];

        if($this->method() === 'PATCH' || $this->method() === 'PUT'){

            $rules['id_cidade'] = [
                'nullable',
            ];

            $rules['valor'] = [
                'nullable',
            ];

        }

        return $rules;
    }
}
