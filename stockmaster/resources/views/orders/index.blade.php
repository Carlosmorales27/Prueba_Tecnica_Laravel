<x-app-layout>

      <x-slot name="title">
        Pedidos
        </x-slot>

    <div class="container mx-auto p-6">

        <div class="flex justify-between items-center mb-6">

            <h1 class="text-3xl font-bold text-neutral">
                Pedidos
            </h1>



            <a href="{{ route('orders.create') }}"
               class="btn btn-neutral">

                Nuevo Pedido

            </a>

         </div>

        @if(session('success'))

            <div class="alert alert-success mb-4">

                {{ session('success') }}

            </div>

        @endif

        

        <div class="overflow-x-auto bg-black">

            <table class="table table-zebra w-full">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Folio</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>PDF</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($orders as $order)

                        <tr>

                            <td>{{ $order->id }}</td>

                            <td>{{ $order->folio }}</td>

                            <td>{{ $order->date }}</td>

                            <td>$ {{ $order->total }}</td>

                            <td>

                                <a href="{{ route('orders.pdf', $order) }}"
                                class="btn btn-error btn-sm">

                                    PDF

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4">

                                No hay pedidos registrados

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-app-layout>