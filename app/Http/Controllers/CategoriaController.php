<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public readonly Categoria $categoria;

    public function __construct()
    {
        $this->categoria = new Categoria();
    }
    public function index()
    {
        $categorias = $this->categoria->All();

        return view('categorias', ['categorias' => $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoria_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->categoria->create([
            'nome' => $request->input('nome'),
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
    public function show(Categoria $categoria)
    {
        // return view('categoria.show', ['categoria' => $categoria]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categoria_edit', ['categoria' => $categoria]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->categoria->where('id', $id)->update($request->except(['_token', '_method']));

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
        $this->categoria->where('id', $id)->delete();

        return redirect()->route('categorias.index');
    }
}
