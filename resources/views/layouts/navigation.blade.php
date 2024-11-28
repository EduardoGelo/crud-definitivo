<nav style="position: fixed; width: 100%" x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/img.jpg') }}" class="h-12 w-12 rounded-full" alt="Imagem">
                </a>
            </div>

            <!-- Desktop Navigation Links -->
            <div class="hidden sm:flex space-x-4">
                <a href="{{ route('dashboard') }}" class="bg-white text-pink-400 px-4 py-2 font-bold rounded hover:bg-pink-400 hover:text-white transition duration-100">Início</a>
                <a href="{{ route('clientes.index') }}" class="bg-white text-pink-400 px-4 py-2 font-bold rounded hover:bg-pink-400 hover:text-white transition duration-100">Clientes</a>
                <a href="{{ route('produtos.index') }}" class="bg-white text-pink-400 px-4 py-2 font-bold rounded hover:bg-pink-400 hover:text-white transition duration-100">Produtos</a>
                <a href="{{ route('categorias.index') }}" class="bg-white text-pink-400 px-4 py-2 font-bold rounded hover:bg-pink-400 hover:text-white transition duration-100">Categorias</a>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex items-center space-x-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition duration-150">
                            {{ Auth::user()->name }}
                            <svg class="ms-1 w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger Button -->
            <div class="sm:hidden flex items-center">
                <button @click="open = ! open" class="p-2 rounded-md text-gray-500 hover:text-gray-700 hover:bg-gray-100 focus:outline-none transition duration-150">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="space-y-1">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 text-pink-400 font-bold hover:bg-pink-400 hover:text-white transition">Início</a>
            <a href="{{ route('clientes.index') }}" class="block px-4 py-2 text-pink-400 font-bold hover:bg-pink-400 hover:text-white transition">Clientes</a>
            <a href="{{ route('produtos.index') }}" class="block px-4 py-2 text-pink-400 font-bold hover:bg-pink-400 hover:text-white transition">Produtos</a>
            <a href="{{ route('categorias.index') }}" class="block px-4 py-2 text-pink-400 font-bold hover:bg-pink-400 hover:text-white transition">Categorias</a>
        </div>
        <div class="border-t border-gray-200 mt-2 pt-4">
            <div class="px-4 text-gray-800">{{ Auth::user()->name }}</div>
            <div class="px-4 text-sm text-gray-500">{{ Auth::user()->email }}</div>
            <div class="mt-2 space-y-1">
                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 rounded">Log Out</button>
                </form>
            </div>
        </div>
    </div>
</nav>
