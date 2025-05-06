<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nome'  => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'cpf'   => ['required', 'unique:clientes,cpf'],
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required'  => 'O nome é obrigatório.',
            'nome.max'       => 'O nome deve ter no máximo 100 caracteres.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email'    => 'Informe um e-mail válido.',
            'email.unique'   => 'Este e-mail já está cadastrado.',
            'cpf.required'   => 'O CPF é obrigatório.',
            'cpf.digits'     => 'O CPF deve conter exatamente 11 dígitos.',
            'cpf.unique'     => 'Este CPF já está cadastrado.',
        ];
    }
}
