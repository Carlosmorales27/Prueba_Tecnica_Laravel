<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">

    <title>Pedido</title>

    <style>

        body{
            font-family: Arial, sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
            margin-top:20px;
        }

        th, td{
            border:1px solid #000;
            padding:8px;
            text-align:left;
        }

    </style>

</head>

<body>

    <h1>StockMaster</h1>

    <h2>Comprobante de Pedido</h2>

    <p><strong>Folio:</strong> {{ $order->folio }}</p>

    <p><strong>Fecha:</strong> {{ $order->date }}</p>

    <table>

        <thead>

            <tr>

                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>

            </tr>

        </thead>

        <tbody>

            @foreach($order->details as $detail)

                <tr>

                    <td>{{ $detail->product->name }}</td>

                    <td>{{ $detail->quantity }}</td>

                    <td>$ {{ $detail->unit_price }}</td>

                    <td>
                        $
                        {{ $detail->quantity * $detail->unit_price }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

    <h2>

        Total:
        $ {{ $order->total }}

    </h2>

</body>

</html>