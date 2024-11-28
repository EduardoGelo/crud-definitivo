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
                    <br><div class="flex items-center justify-between">
                        <h1 class="mb-0 text-3xl">Lista de clientes</h1>
                        <a href="{{ route('clientes.create') }}" class="bg-pink-500 text-white font-bold py-2 px-4 rounded hover:bg-pink-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Adicionar cliente</a>
                    </div>
                    <br>
                    <hr />
                    <!-- checa onde ta esse success -->
                    @if(Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <div class="overflow-x-auto">
    <table class="table-auto w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-3 w-1/3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                <th class="px-6 py-3 w-1/6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                <th class="px-6 py-3 w-1/6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">CPF</th>
                <th class="px-6 py-3 w-1/3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($clientes as $cliente)
            <tr class="bg-white border-b">

                <td class="px-6 py-4 whitespace-nowrap">{{$cliente->nome}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center">{{$cliente->email}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center">{{$cliente->cpf}}</td>
                <td class="px-6 py-4 whitespace-nowrap flex justify-center space-x-2">
                                    <div class="flex space-x-2" role="group" aria-label="Clientes">
                                        <a href="{{ route('clientes.edit', ['cliente' => $cliente->id]) }}" type="button" class="px-4 py-2 text-white bg-gray-500 hover:bg-gray-600 rounded">Editar</a>
                                        
                                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja excluir este cliente?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded">Excluir</button>
                                        </form>
                                    </div>
                                </td>
                                </tr>
                                @empty
                                <tr>
                                    <td class="mb-0 text-3xl" colspan="5">Sem clientes cadastrados</td>
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



