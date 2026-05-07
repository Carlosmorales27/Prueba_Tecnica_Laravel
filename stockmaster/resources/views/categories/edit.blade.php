<x-app-layout>

    <div class="container mx-auto p-6">

        <div class="card bg-base-100 shadow-xl">

            <div class="card-body">

                <h1 class="text-3xl font-bold mb-4">

                    Editar Categoria

                </h1>

                <form action="{{ route('categories.update', $category) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Nombre</span>
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $category->name }}"
                               class="input input-bordered w-full  text-neutral">

                    </div>

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Descripción</span>
                        </label>

                        <input type="text"
                               name="description"
                               value="{{ $category->description }}"
                               class="input input-bordered w-full text-neutral" >

                    </div>
                    <button class="btn btn-warning">

                        Actualizar Producto

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>