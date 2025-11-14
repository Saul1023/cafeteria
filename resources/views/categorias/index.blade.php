<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Listado de Categorías</h2>
            <a href="{{ route('categorias.create') }}"
               class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded flex items-center">
                <i class="fas fa-plus mr-2"></i> Nueva Categoría
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">Descripción</th>
                        <th class="px-6 py-3 text-left text-sm font-medium uppercase">Estado</th>
                        <th class="px-6 py-3 text-center text-sm font-medium uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($categorias as $categoria)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $categoria->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $categoria->nombre }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $categoria->descripcion }}</td>
                            <td class="px-6 py-4 text-sm">
                                <span class="px-2 py-1 rounded-full text-white {{ $categoria->estado ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $categoria->estado ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center flex justify-center gap-2">
                                <a href="{{ route('categorias.edit', $categoria->id) }}"
                                   class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                                            onclick="return confirm('¿Seguro que deseas eliminar esta categoría?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            @if($categorias->isEmpty())
                <p class="text-center text-gray-500 py-4">No hay categorías registradas.</p>
            @endif
        </div>
    </div>
</x-app-layout>
