<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Productos de la Cafetería</h2>
            <a href="#"
               class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded flex items-center">
                <i class="fas fa-plus mr-2"></i> Nuevo Producto
            </a>
        </div>

        @php
            // Simulación de productos de cafetería
            $productos = [
                ['nombre' => 'Café Espresso', 'descripcion' => 'Café intenso y aromático.', 'categoria' => 'Café', 'precio' => '8.00', 'estado' => true, 'imagen' => 'https://via.placeholder.com/150?text=Café'],
                ['nombre' => 'Café Latte', 'descripcion' => 'Café con leche y espuma cremosa.', 'categoria' => 'Café', 'precio' => '10.00', 'estado' => true, 'imagen' => 'https://via.placeholder.com/150?text=Latte'],
                ['nombre' => 'Jugo de Naranja', 'descripcion' => 'Jugo natural recién exprimido.', 'categoria' => 'Jugos', 'precio' => '6.00', 'estado' => true, 'imagen' => 'https://via.placeholder.com/150?text=Jugo'],
                ['nombre' => 'Sándwich de Pollo', 'descripcion' => 'Pan con pollo, lechuga y tomate.', 'categoria' => 'Bocadillos', 'precio' => '12.00', 'estado' => false, 'imagen' => 'https://via.placeholder.com/150?text=Sándwich'],
                ['nombre' => 'Croissant', 'descripcion' => 'Croissant recién horneado.', 'categoria' => 'Panadería', 'precio' => '5.00', 'estado' => true, 'imagen' => 'https://via.placeholder.com/150?text=Croissant'],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($productos as $producto)
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition flex flex-col">
                    <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full h-40 object-cover">
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $producto['nombre'] }}</h3>
                            <p class="text-gray-600 text-sm mb-2">{{ Str::limit($producto['descripcion'], 60) }}</p>
                            <p class="text-gray-500 text-sm mb-1">Categoría: <span class="font-medium">{{ $producto['categoria'] }}</span></p>
                            <p class="text-gray-500 text-sm mb-2">Precio: <span class="font-medium">${{ $producto['precio'] }}</span></p>
                            <p class="text-sm">
                                Estado:
                                <span class="px-2 py-1 rounded-full text-white {{ $producto['estado'] ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $producto['estado'] ? 'Disponible' : 'No disponible' }}
                                </span>
                            </p>
                        </div>

                        <div class="mt-4 flex justify-between">
                            <a href="#"
                               class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded flex items-center">
                                <i class="fas fa-edit mr-1"></i> Editar
                            </a>
                            <button type="button"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded flex items-center"
                                    onclick="alert('Simulación de eliminar producto')">
                                <i class="fas fa-trash-alt mr-1"></i> Eliminar
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
