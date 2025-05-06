<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use Exception;

class ClienteController extends Controller
{
    public readonly Cliente $cliente;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }

    public function index()
    {
        $clientes = $this->cliente->all();
        return view('clientes', ['clientes' => $clientes]);
    }

    public function create()
    {
        return view('cliente_create');
    }

    public function store(ClienteRequest $request)
    {
        try {
            $created = $this->cliente->create($request->validated());

            if ($created) {
                return redirect()->route('clientes.index')->with('success', 'Cliente adicionado com sucesso!');
            }

            return redirect()->back()->with('error', 'Erro ao adicionar cliente.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao adicionar cliente.');
        }
    }

    public function show(Cliente $cliente)
    {
        // return view('cliente.show', ['cliente' => $cliente]);
    }

    public function edit(Cliente $cliente)
    {
        return view('cliente_edit', ['cliente' => $cliente]);
    }

    public function update(ClienteRequest $request, string $id)
    {
        try {
            $updated = $this->cliente->where('id', $id)->update($request->validated());

            if ($updated) {
                return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
            }

            return redirect()->back()->with('error', 'Erro ao atualizar cliente.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar cliente.');
        }
    }

    public function destroy(string $id)
    {
        $this->cliente->where('id', $id)->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente removido com sucesso!');
    }
}
