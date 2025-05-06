<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
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
            'preco' => 'required|numeric|min:0',
            'quantidade' => 'required|integer|min:1',
            'categorias_id' => 'required|exists:categorias,id',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nome.required' => 'O nome do produto é obrigatório.',
            'preco.required' => 'O preço do produto é obrigatório.',
            'quantidade.required' => 'A quantidade é obrigatória.',
            'categorias_id.required' => 'A categoria do produto é obrigatória.',
            'preco.numeric' => 'O preço deve ser um número.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'categorias_id.exists' => 'A categoria selecionada não existe.',
        ];
    }
}
