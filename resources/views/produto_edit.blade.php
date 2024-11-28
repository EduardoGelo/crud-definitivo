<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar produto') }}
            </h2>
        </x-slot>

        <div class="min-h-screen items-center pt-6 sm:pt-0 bg-pink-300">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("Editar produto") }}
                            <br><br>

                            @if (session()->has('message'))
                                {{ session()->get('message') }}
                            @endif

                            <br>
                            <br>
                            <p><a href="{{ route('produtos.index') }}"
                                    class="bg-pink-500 text-white font-bold py-2 px-4 rounded hover:bg-pink-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Voltar</a>
                            </p>
                            <form action="{{ route('produtos.update', ['produto' => $produto->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <br><br>
                                <input type="text"
                                    class="border border-gray-300 rounded-md p-2 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    name="nome" value="{{ $produto->nome }}" required>
                                <br><br>
                                <input type="decimal"
                                    class="border border-gray-300 rounded-md p-2 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    name="preco" value="{{$produto->preco}}" required>
                                <br><br>
                                <input type="number"
                                    class="border border-gray-300 rounded-md p-2 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    name="quantidade" value="{{ $produto->quantidade }}" required>
                                <br><br>
                                <select name="categorias_id"
                                    class="border border-gray-300 rounded-md p-2 w-full transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    required>
                                    <option value="" disabled selected hidden>Selecione a categoria desejada</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" 
                                            {{ $produto->categorias_id == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nome }}
                                        </option>
                                    @endforeach
                                </select>
                                <br><br>
                                <button
                                    class="bg-pink-500 text-white font-bold py-2 px-4 rounded hover:bg-pink-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                                    type="submit">Enviar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>

</html>
