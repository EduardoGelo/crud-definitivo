<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Http\Requests\StoreMaterialRequest;
use Illuminate\Http\Request;
use Exception;

class MaterialController extends Controller
{
    public function index()
    {
        $materiais = Material::all();
        return view('materiais', compact('materiais'));
    }

    public function create()
    {
        return view('material_create');
    }

    public function store(StoreMaterialRequest $request) 
    {
        try {
            Material::create($request->all());
            return redirect()->route('materiais.index')->with('success', 'Material cadastrado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao cadastrar material.');
        }
    }

    public function show(Material $material)
    {
        return view('materiais', compact('material'));
    }

    public function edit(Material $material)
    {
        return view('material_edit', compact('material'));
    }

    public function update(StoreMaterialRequest $request, Material $material)
    {
        try {
            $material->update($request->all());
            return redirect()->route('materiais.index')->with('success', 'Material atualizado com sucesso!');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar material.');
        }
    }

    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('materiais.index')->with('success', 'Material removido com sucesso!');
    }
}
