<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMaterialRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'quantidade' => 'required|integer|min:1',
            'unidade_medida' => 'required|string|max:50',
            'categoria' => 'required|string|max:100',
        ];
    }

    /**
     * Customizar as mensagens de erro.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O nome do material é obrigatório.',
            'nome.string' => 'O nome do material deve ser uma string.',
            'nome.max' => 'O nome do material não pode ter mais de 255 caracteres.',
            'quantidade.required' => 'A quantidade é obrigatória.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade deve ser no mínimo 1.',
            'unidade_medida.required' => 'A unidade de medida é obrigatória.',
            'unidade_medida.string' => 'A unidade de medida deve ser uma string.',
            'unidade_medida.max' => 'A unidade de medida não pode ter mais de 50 caracteres.',
            'categoria.required' => 'A categoria é obrigatória.',
            'categoria.string' => 'A categoria deve ser uma string.',
            'categoria.max' => 'A categoria não pode ter mais de 100 caracteres.',
        ];
    }
}
