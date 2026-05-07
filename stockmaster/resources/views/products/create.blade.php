<x-app-layout>

    <div class="container mx-auto p-6">

        <div class="card bg-base-100 shadow-xl">

            <div class="card-body">

                <h1 class="text-3xl font-bold mb-4">

                    Nuevo Producto

                </h1>
                @if ($errors->any())

    <div class="alert alert-error mb-4 shadow-lg">

        <div>

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="stroke-current shrink-0 h-6 w-6"
                 fill="none"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z" />

            </svg>

            <div>

                <h3 class="font-bold">

                    No se pudo guardar el producto

                </h3>

                <ul class="list-disc ms-5 mt-2">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        </div>

    </div>

@endif

                <form action="{{ route('products.store') }}"
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
                            <span class="label-text">SKU</span>
                        </label>

                        <input type="text"
                               name="sku"
                               class="input input-bordered w-full text-neutral">

                    </div>

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Precio</span>
                        </label>

                        <input type="number"
                               step="0.01"
                               name="price"
                               class="input input-bordered w-full text-neutral">

                    </div>

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Stock</span>
                        </label>

                        <input type="number"
                               name="stock"
                               class="input input-bordered w-full text-neutral">

                    </div>

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Categoría</span>
                        </label>

                        <select name="category_id"
                                class="select select-bordered w-full text-neutral">

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}">

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <button class="btn btn-primary">

                        Guardar Producto

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>