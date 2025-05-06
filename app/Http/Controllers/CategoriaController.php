<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoriaRequest;
use App\Models\Categoria;
use Exception;

class CategoriaController extends Controller
{
    public readonly Categoria $categoria;

    public function __construct()
    {
        $this->categoria = new Categoria();
    }

    public function index()
    {
        $categorias = $this->categoria->all();
        return view('categorias', ['categorias' => $categorias]);
    }

    public function create()
    {
        return view('categoria_create');
    }

    public function store(CategoriaRequest $request)
    {
        try {
            $created = $this->categoria->create([
                'nome' => $request->input('nome'),
            ]);

            if ($created) {
                return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
            }

            return redirect()->back()->with('error', 'Erro ao criar categoria.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao criar categoria.');
        }
    }

    public function show(Categoria $categoria)
    {
        // return view('categoria.show', ['categoria' => $categoria]);
    }

    public function edit(Categoria $categoria)
    {
        return view('categoria_edit', ['categoria' => $categoria]);
    }

    public function update(CategoriaRequest $request, string $id)
    {
        try {
            $updated = $this->categoria->where('id', $id)->update([
                'nome' => $request->input('nome'),
            ]);

            if ($updated) {
                return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
            }

            return redirect()->back()->with('error', 'Erro ao atualizar categoria.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar categoria.');
        }
    }

    public function destroy(string $id)
    {
        $this->categoria->where('id', $id)->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria removida com sucesso!');
    }
}
