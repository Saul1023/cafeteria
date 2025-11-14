<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen flex">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-800 text-gray-100 flex flex-col shadow-lg">
            <div class="p-6 text-center border-b border-gray-700">
                <h1 class="text-xl font-bold">{{ config('app.name', 'Laravel') }}</h1>
            </div>

            <nav class="flex-1 p-4">
                <ul class="space-y-2">

                    <li>
                        <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categorias.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('categorias.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-tags mr-2"></i> Categorías
                        </a>
                    <li>
                        <a href="{{ route('productos.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('productos.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-box-open mr-2"></i> Productos
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('ventas.index') }}" class="block px-4 py-2 rounded hover:bg-gray-700 {{ request()->routeIs('ventas.*') ? 'bg-gray-700' : '' }}">
                            <i class="fas fa-cash-register mr-2"></i> Ventas
                        </a>
                    </li>

                </ul>
            </nav>

            <div class="p-6 border-t border-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gray-600 rounded-full flex items-center justify-center font-bold">
                        {{ substr(auth()->user()->name ?? 'U',0,1) }}
                    </div>
                    <div>
                        <div class="font-semibold">{{ auth()->user()->name ?? 'Usuario' }}</div>
                        <small>{{ auth()->user()?->persona?->tipoPersona->nombre_tipo ?? 'Usuario' }}</small>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 rounded text-white text-sm font-semibold">
                        <i class="fas fa-sign-out-alt mr-2"></i> Cerrar sesión
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">

            <!-- Header opcional -->
            @if (isset($header))
                <header class="bg-white shadow p-4">
                    <div class="max-w-7xl mx-auto">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Contenido dinámico -->
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>

        </div>
    </div>

    @stack('modals')
    @livewireScripts
</body>
</html>
