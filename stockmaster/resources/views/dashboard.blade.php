<x-app-layout>

      <x-slot name="title">
        Panel Administrativo
        </x-slot>
    <x-slot name="header">

        <h2 class="font-bold text-2xl text-neutral">

            Dashboard StockMaster

        </h2>

    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- CARDS -->

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <!-- PRODUCTOS -->

                <div class="card bg-primary text-primary-content shadow-xl">

                    <div class="card-body">

                        <h2 class="card-title text-2xl">

                            Productos

                        </h2>

                        <p class="text-4xl font-bold">

                            {{ \App\Models\Product::count() }}

                        </p>

                        <div class="card-actions justify-end">

                            <a href="{{ route('products.index') }}"
                               class="btn btn-sm btn-neutral">

                                Ver Productos

                            </a>

                        </div>

                    </div>

                </div>

                <!-- CATEGORIAS -->

                <div class="card bg-secondary text-secondary-content shadow-xl">

                    <div class="card-body">

                        <h2 class="card-title text-2xl">

                            Categorías

                        </h2>

                        <p class="text-4xl font-bold">

                            {{ \App\Models\Category::count() }}

                        </p>

                        <div class="card-actions justify-end">

                            <a href="{{ route('categories.index') }}"
                               class="btn btn-sm btn-neutral">

                                Ver Categorías

                            </a>

                        </div>

                    </div>

                </div>

                <!-- PEDIDOS -->

                <div class="card bg-accent text-accent-content shadow-xl">

                    <div class="card-body">

                        <h2 class="card-title text-2xl">

                            Pedidos

                        </h2>

                        <p class="text-4xl font-bold">

                            {{ \App\Models\Order::count() }}

                        </p>

                        <div class="card-actions justify-end">

                            <a href="{{ route('orders.index') }}"
                               class="btn btn-sm btn-neutral bg-black">

                                Ver Pedidos

                            </a>

                        </div>

                    </div>

                </div>

            </div>

            <!-- TABLA PRODUCTOS RECIENTES -->

            <div class="card bg-base-100 shadow-xl">

                <div class="card-body">

                    <h2 class="card-title text-2xl mb-4">

                        Productos Recientes

                    </h2>

                    <div class="overflow-x-auto">

                        <table class="table table-zebra">

                            <thead>

                                <tr>

                                    <th>Nombre</th>
                                    <th>SKU</th>
                                    <th>Precio</th>
                                    <th>Stock</th>

                                </tr>

                            </thead>

                            <tbody>

                                @foreach(\App\Models\Product::latest()->take(5)->get() as $product)

                                    <tr>

                                        <td>{{ $product->name }}</td>

                                        <td>{{ $product->sku }}</td>

                                        <td>$ {{ $product->price }}</td>

                                        <td>{{ $product->stock }}</td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>