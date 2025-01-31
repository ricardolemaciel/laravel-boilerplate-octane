<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            //
            "name" => "required|string",
            "email" => "required|email",
            "password" => "required|string",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "O campo nome é obrigatório",
            "name.string" => "O campo nome deve ser uma string",
            "email.required" => "O campo email é obrigatório",
            "email.email" => "O campo email deve ser um email válido",
            "password.required" => "O campo senha é obrigatório",
            "password.string" => "O campo senha deve ser uma string",
        ];
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new \App\Exceptions\ValidationException($validator);
    }
}
