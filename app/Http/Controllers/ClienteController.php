<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public readonly Cliente $cliente;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }


    public function index()
    {
        
        $clientes = $this->cliente->All();

        return view('clientes', ['clientes' => $clientes]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->cliente->create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf')
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
    public function show(Cliente $cliente)
    {
        // return view('cliente.show', ['cliente' => $cliente]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente_edit', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updated = $this->cliente->where('id', $id)->update($request->except(['_token', '_method']));

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
        $this->cliente->where('id', $id)->delete();

        return redirect()->route('clientes.index');
    }
}
