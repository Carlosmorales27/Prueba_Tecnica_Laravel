<x-app-layout>

        <x-slot name="title">
        Productos
        </x-slot>

    <div class="container mx-auto p-6">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold text-neutral">
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

        <form method="GET"
      action="{{ route('products.index') }}"
      class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

    <input type="text"
           name="search"
           placeholder="Buscar por nombre o SKU"
           value="{{ request('search') }}"
           class="input input-bordered w-full text-neutral">

    <select name="category_id"
            class="select select-bordered w-full text-neutral">

        <option value="">Todas las categorías</option>

        @foreach($categories as $category)

            <option value="{{ $category->id }}"
                {{ request('category_id') == $category->id ? 'selected' : '' }}>

                {{ $category->name }}

            </option>

        @endforeach

    </select>

    <select name="sort"
            class="select select-bordered w-full text-neutral">

        <option value="">Ordenar</option>

        <option value="price_asc"
            {{ request('sort') == 'price_asc' ? 'selected' : '' }}>

            Precio menor a mayor

        </option>

        <option value="price_desc"
            {{ request('sort') == 'price_desc' ? 'selected' : '' }}>

            Precio mayor a menor

        </option>

        <option value="stock"
            {{ request('sort') == 'stock' ? 'selected' : '' }}>

            Mayor stock

        </option>

    </select>

    <button class="btn btn-neutral bg-black">

        Filtrar

    </button>

</form>

        <div class="overflow-x-auto bg-base-100 shadow-lg rounded-lg">

            <table class="table table-zebra ">

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

                                    <button class="btn btn-error bg-red-700 btn-sm  ">

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