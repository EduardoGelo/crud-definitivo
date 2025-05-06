<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artes da tia eva</title>
</head>
<body>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="min-h-screen items-center pt-6 sm:pt-0 bg-pink-300">
     <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <br>
                    <div class="mb-4">
                        <span class="text-lg font-semibold text-gray-700">
                            Total de categorias cadastrados: 
                        </span>
                        <span class="text-lg font-bold text-pink-700">
                            {{ $categorias->count() }}
                        </span>
                    </div>
                    <div class="flex items-center justify-between">
                        <h1 class="mb-0 text-3xl">Lista de categorias</h1>
                        <a href="{{ route('categorias.create') }}" class="bg-pink-500 text-white font-bold py-2 px-4 rounded hover:bg-pink-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Adicionar categoria</a>
                    </div>
                    <br>
                    <hr />
                    @if(Session::has('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-3" role="alert" id="successAlert">
        {{ Session::get('success') }}
        <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-green-700" onclick="document.getElementById('successAlert').remove()">
            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Fechar</title>
                <path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414L8.828 10l-3.176 3.176a1 1 0 101.414 1.414L10 12.828l3.176 3.176a1 1 0 101.414-1.414L11.172 10l3.176-3.176z" />
            </svg>
        </button>
    </div>
@endif

@if(Session::has('error'))
    <div id="errorAlert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Erro!</strong>
        <span class="block sm:inline">{{ Session::get('error') }}</span>
        <button type="button" onclick="document.getElementById('errorAlert').remove()" class="absolute top-0 bottom-0 right-0 px-4 py-3 text-red-700">
            <svg class="fill-current h-6 w-6" role="button" xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 20 20">
                <title>Fechar</title>
                <path d="M14.348 5.652a1 1 0 10-1.414-1.414L10 7.172 7.066 4.238a1 1 0 10-1.414 1.414L8.828 10l-3.176 3.176a1 1 0 101.414 1.414L10 12.828l3.176 3.176a1 1 0 101.414-1.414L11.172 10l3.176-3.176z" />
            </svg>
        </button>
    </div>
@endif


                    <div class="overflow-x-auto">
    <table class="table-auto w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3 w-1/3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 w-1/3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($categorias as $categoria)
            <tr class="bg-white border-b">

                <td class="px-6 py-4 whitespace-nowrap">{{$categoria->nome}}</td>
                <td class="px-6 py-4 whitespace-nowrap flex justify-center space-x-2">
                                    <div class="flex space-x-2" role="group" aria-label="Categorias">
                                        <a href="{{ route('categorias.edit', ['categoria' => $categoria->id]) }}" type="button" class="px-4 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded">Editar</a>
                                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir esta categoria?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded">Excluir</button>
                                        </form>
                                    </div>
                                </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="mb-0 text-3xl" colspan="5">Sem categorias cadastradas</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</body>
</html>



