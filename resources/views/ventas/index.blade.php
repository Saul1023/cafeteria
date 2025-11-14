<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Venta de Cafetería</h2>
            <button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                <i class="fas fa-shopping-cart mr-2"></i> Ver Carrito
            </button>
        </div>

        @php
            // Simulación de productos de cafetería
            $productos = [
                ['nombre' => 'Café Espresso', 'descripcion' => 'Café intenso y aromático.', 'precio' => 8.00, 'imagen' => 'https://via.placeholder.com/150?text=Café'],
                ['nombre' => 'Café Latte', 'descripcion' => 'Café con leche y espuma cremosa.', 'precio' => 10.00, 'imagen' => 'https://via.placeholder.com/150?text=Latte'],
                ['nombre' => 'Jugo de Naranja', 'descripcion' => 'Jugo natural recién exprimido.', 'precio' => 6.00, 'imagen' => 'https://via.placeholder.com/150?text=Jugo'],
                ['nombre' => 'Sándwich de Pollo', 'descripcion' => 'Pan con pollo, lechuga y tomate.', 'precio' => 12.00, 'imagen' => 'https://via.placeholder.com/150?text=Sándwich'],
                ['nombre' => 'Croissant', 'descripcion' => 'Croissant recién horneado.', 'precio' => 5.00, 'imagen' => 'https://via.placeholder.com/150?text=Croissant'],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($productos as $producto)
                <div class="bg-white shadow rounded-lg overflow-hidden hover:shadow-lg transition flex flex-col">
                    <img src="{{ $producto['imagen'] }}" alt="{{ $producto['nombre'] }}" class="w-full h-40 object-cover">
                    <div class="p-4 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $producto['nombre'] }}</h3>
                            <p class="text-gray-600 text-sm mb-2">{{ $producto['descripcion'] }}</p>
                            <p class="text-gray-500 text-sm mb-2">Precio: <span class="font-medium">${{ number_format($producto['precio'], 2) }}</span></p>
                        </div>

                        <div class="mt-4 flex flex-col gap-2">
                            <input type="number" min="1" value="1" class="border rounded px-2 py-1 w-full text-center" placeholder="Cantidad">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-2 rounded flex items-center justify-center">
                                <i class="fas fa-cart-plus mr-2"></i> Agregar
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
