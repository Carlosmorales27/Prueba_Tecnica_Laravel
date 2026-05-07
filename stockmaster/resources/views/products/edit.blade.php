<x-app-layout>

    <div class="container mx-auto p-6">

        <div class="card bg-base-100 shadow-xl">

            <div class="card-body">

                <h1 class="text-3xl font-bold mb-4">

                    Editar Producto

                </h1>

                <form action="{{ route('products.update', $product) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Nombre</span>
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $product->name }}"
                               class="input input-bordered w-full  text-neutral">

                    </div>

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">SKU</span>
                        </label>

                        <input type="text"
                               name="sku"
                               value="{{ $product->sku }}"
                               class="input input-bordered w-full text-neutral" >

                    </div>

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Precio</span>
                        </label>

                        <input type="number"
                               step="0.01"
                               name="price"
                               value="{{ $product->price }}"
                               class="input input-bordered w-full text-neutral">

                    </div>

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Stock</span>
                        </label>

                        <input type="number"
                               name="stock"
                               value="{{ $product->stock }}"
                               class="input input-bordered w-full text-neutral" >

                    </div>

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Categoría</span>
                        </label>

                        <select name="category_id"
                                class="select select-bordered w-full text-neutral">

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <button class="btn btn-warning">

                        Actualizar Producto

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>