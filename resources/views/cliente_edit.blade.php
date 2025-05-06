<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=], initial-scale=1.0">
    <title>Editar cliente</title>
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Editar cliente') }}
            </h2>
        </x-slot>

        <div class="min-h-screen items-center pt-6 sm:pt-0 bg-pink-300">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            {{ __("Editar cliente") }}
                            <br><br>

                            @if (session()->has('message'))
                                {{ session()->get('message') }}
                            @endif

                            <br>
                            <br>
                            <p><a href="{{ route('clientes.index') }}"
                                    class="bg-pink-500 text-white font-bold py-2 px-4 rounded hover:bg-pink-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Voltar</a>
                            </p>
                            <form action="{{ route('clientes.update', ['cliente' => $cliente->id]) }}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <br><br>
                                <input type="text"
                                    class="border border-gray-300 rounded-md p-2 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    name="nome" placeholder="Nome" value="{{ $cliente->nome }}" required>
                                @error('nome')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <br><br>
                                <input type="text"
                                    class="border border-gray-300 rounded-md p-2 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    name="email" placeholder="E-mail" value="{{$cliente->email}}" required>
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                <br><br>
                                <input type="text" id="cpf" name="cpf"
                                    class="border border-gray-300 rounded-md p-2 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500 shadow-sm focus:shadow-lg placeholder-gray-400 placeholder-opacity-70"
                                    placeholder="CPF" value="{{ $cliente->cpf }}" required maxlength="14">
                                @error('cpf')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror

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
    <script>
        document.getElementById('cpf').addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, '');

            if (value.length > 11) value = value.slice(0, 11);

            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d)/, '$1.$2');
            value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');

            e.target.value = value;
        });

        window.onload = function () {
            const cpfInput = document.getElementById('cpf');
            if (cpfInput.value) {
                cpfInput.dispatchEvent(new Event('input'));
            }
        }
    </script>


</body>

</html>