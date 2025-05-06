<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoRequest;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private Produto $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function index()
    {
        $produtos = Produto::with('categorias')->get();

        return view('produtos', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('produto_create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProdutoRequest $request) 
    {
        $created = $this->produto->create([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'quantidade' => $request->input('quantidade'),
            'categorias_id' => $request->input('categorias_id')
        ]);

        if ($created) {
            return redirect()->route('produtos.index')->with('success', 'Produto cadastrado com sucesso!');
        }

        return redirect()->back()->with('error', 'Algo deu errado ao cadastrar o produto.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        // return view('produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();

        return view('produto_edit', compact('categorias', 'produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProdutoRequest $request, string $id)
    {
        $updated = $this->produto->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated) {
            return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
        }

        return redirect()->back()->with('error', 'Algo deu errado ao atualizar o produto.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->produto->where('id', $id)->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
