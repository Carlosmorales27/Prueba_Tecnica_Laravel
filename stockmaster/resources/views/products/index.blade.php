<x-app-layout>

    <div class="container mx-auto p-6">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold">
                Productos
            </h1>

            <a href="{{ route('products.create') }}"
               class="btn btn-neutral">

                Agregar Producto

            </a>

        </div>

        @if(session('success'))

            <div class="alert alert-success mb-4">

                {{ session('success') }}

            </div>

        @endif

        <div class="overflow-x-auto bg-base-100 shadow-lg rounded-lg">

            <table class="table table-zebra">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>SKU</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($products as $product)

                        <tr>

                            <td>{{ $product->id }}</td>

                            <td>{{ $product->name }}</td>

                            <td>{{ $product->sku }}</td>

                            <td>$ {{ $product->price }}</td>

                            <td>{{ $product->stock }}</td>

                            <td>{{ $product->category->name }}</td>

                            <td class="flex gap-2">

                                <a href="{{ route('products.edit', $product) }}"
                                   class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <form action="{{ route('products.destroy', $product) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-error btn-sm">

                                        Eliminar

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>