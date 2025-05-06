<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Material</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar Material') }}
            </h2>
        </x-slot>

        <div class="min-h-screen items-center pt-6 sm:pt-0 bg-pink-300">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("Editar Material") }}
                            <br><br>

                            @if (session()->has('message'))
                                {{ session()->get('message') }}
                            @endif

                            <br><br>
                            <p><a href="{{ route('materiais.index') }}"
                                  class="bg-pink-500 text-white font-bold py-2 px-4 rounded hover:bg-pink-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Voltar</a>
                            </p>
                            <form action="{{ route('materiais.update', ['material' => $material->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <br><br>

                                <input type="text"
                                    class="border border-gray-300 rounded-md p-2 w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    name="nome" placeholder="Nome" value="{{ old('nome', $material->nome) }}" required>
                                @error('nome')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                <br><br>

                                <input type="number"
                                    class="border border-gray-300 rounded-md p-2 w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    name="quantidade" placeholder="Quantidade" value="{{ old('quantidade', $material->quantidade) }}" required>
                                @error('quantidade')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                <br><br>

                                <input type="text"
                                    class="border border-gray-300 rounded-md p-2 w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    name="unidade_medida" placeholder="Unidade de Medida" value="{{ old('unidade_medida', $material->unidade_medida) }}" required>
                                @error('unidade_medida')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                <br><br>

                                <input type="text"
                                    class="border border-gray-300 rounded-md p-2 w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    name="categoria" placeholder="Categoria" value="{{ old('categoria', $material->categoria) }}" required>
                                @error('categoria')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                                <br><br>

                                <button
                                    class="bg-pink-500 text-white font-bold py-2 px-4 rounded hover:bg-pink-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                                    type="submit">Atualizar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
