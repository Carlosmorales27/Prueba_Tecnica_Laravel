<x-app-layout>

    <div class="container mx-auto p-6">

        <div class="card bg-base-100 shadow-xl">

            <div class="card-body">

                <h1 class="text-3xl font-bold mb-4">

                    Nuevo Pedido

                </h1>

                <form action="{{ route('orders.store') }}"
                      method="POST">

                    @csrf

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Producto</span>
                        </label>

                        <select name="product_id"
                                class="select select-bordered w-full  text-neutral">

                            @foreach($products as $product)

                                <option value="{{ $product->id }}">

                                    {{ $product->name }}
                                    -
                                    Stock: {{ $product->stock }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-4">

                        <label class="label">
                            <span class="label-text">Cantidad</span>
                        </label>

                        <input type="number"
                               name="quantity"
                               min="1"
                               class="input input-bordered w-full text-neutral">

                    </div>

                    <button class="btn btn-primary">

                        Crear Pedido

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>