<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
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
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ];

        if($this->method() === 'PATCH'){

            $rules['email'] = [
                'nullable',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->email),
            ];

            $rules['password'] = [
                'nullable',
                'min:6',
                'max:50',
            ];

        }

        return $rules;

    }
}
