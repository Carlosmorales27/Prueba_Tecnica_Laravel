<x-app-layout>

    <div class="container mx-auto p-6">

        <div class="card bg-base-100 shadow-xl">

            <div class="card-body">

                <h1 class="text-3xl font-bold mb-4">

                    Nueva Categoría

                </h1>

                <form action="{{ route('categories.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Nombre</span>
                        </label>

                        <input type="text"
                               name="name"
                               class="input input-bordered w-full text-neutral">

                    </div>

                    <div class="mb-4">

                        <label class="label">   
                            <span class="label-text">Descripción</span>
                        </label>

                        <input type="text"
                               name="description"
                               class="input input-bordered w-full text-neutral">

                    </div>

                    <button class="btn btn-primary">

                        Guardar Categoría

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>