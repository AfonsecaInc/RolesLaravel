<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:20',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ];
    }

    public function messages(){
        return [
            'name.required' => 'El :attribute es requerido.',
            'username.required' => 'El :attribute es requerido.',
            'username.unique' => 'El :attribute ya está en uso.',
            'email.required' => 'El :attribute es requerido.',
            'email.email' => 'El :attribute debe ser un correo válido.',
            'email.unique' => 'El :attribute ya está registrado.',
            'password.required' => 'La :attribute es requerido.'
        ];
    }

    public function attributes(){
        return [
            'name' => 'nombre',
            'username' => 'nombre de usuario',
            'email' => 'correo',
            'password' => 'contraseña'
        ];
    }
}
