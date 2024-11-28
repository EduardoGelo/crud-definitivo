<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public readonly Produto $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }
    public function index()
    {
        $produtos = Produto::With('categorias')->get();

        return view('produtos', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all(); 

        // Retornar a view com as categorias
        return view('produto_create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->produto->create([
            'nome' => $request->input('nome'),
            'preco' => $request->input('preco'),
            'quantidade' => $request->input('quantidade'),
            'categorias_id' => $request->input('categorias_id')
        ]);

        if ($created)
        {
            return redirect()->back()->with('message', 'Criado com sucesso');
        }

        return redirect()->back()->with('message', 'Algo deu errado');
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

        // Retornar a view com as categorias
        return view('produto_edit', compact('categorias', 'produto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->produto->where('id', $id)->update($request->except(['_token', '_method']));

        if ($updated)
        {
            return redirect()->back()->with('message', 'Atualizado com sucesso');
        }

        return redirect()->back()->with('message', 'Algo deu errado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->produto->where('id', $id)->delete();

        return redirect()->route('produtos.index');
    }
}
