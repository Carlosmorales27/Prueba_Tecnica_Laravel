<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $orders = Order::latest()->get();

    return view('orders.index', compact('orders'));
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    $products = Product::where('stock', '>', 0)->get();

    return view('orders.create', compact('products'));
}

    /**
     * Store a newly created resource in storage.
     */
 public function store(Request $request)
{
    $request->validate([

        'product_id' => 'required',

        'quantity' => 'required|integer|min:1'

    ]);

    DB::transaction(function () use ($request) {

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {

            return back()
                ->with('error', 'Stock insuficiente');

        }

        $total = $product->price * $request->quantity;

        $order = Order::create([

            'folio' => 'ORD-' . time(),

            'date' => now(),

            'total' => $total

        ]);

        OrderDetail::create([

            'order_id' => $order->id,

            'product_id' => $product->id,

            'quantity' => $request->quantity,

            'unit_price' => $product->price

        ]);

        $product->decrement('stock', $request->quantity);

    });

    return redirect()
        ->route('orders.index')
        ->with('success', 'Pedido creado correctamente');
}



    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }


    public function pdf(Order $order)
    {
    $order->load('details.product');

    $pdf = Pdf::loadView('orders.pdf', compact('order'));

    return $pdf->download('pedido-'.$order->folio.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
