<x-app-layout>

    <div class="container mx-auto p-6">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold">
                Productos
            </h1>

            <a href="{{ route('categories.create') }}"
               class="btn btn-neutral">

                Agregar Categoria

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
                        <th>Descripción</th>


                    </tr>

                </thead>

                <tbody>

                    @foreach($categories as $category)

                        <tr>

                            <td>{{ $category->id }}</td>

                            <td>{{ $category->name }}</td>

                            <td>{{ $category->description }}</td>


                            <td class="flex gap-2">

                                <a href="{{ route('categories.edit', $category) }}"
                                   class="btn btn-warning btn-sm">

                                    Editar

                                </a>

                                <form action="{{ route('categories.destroy', $category) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-error btn-sm bg-red-600">

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