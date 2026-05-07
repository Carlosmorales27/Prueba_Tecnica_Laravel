<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    $query = Product::with('category');

    // BUSCADOR
    if ($request->search) {

        $query->where(function ($q) use ($request) {

            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('sku', 'like', '%' . $request->search . '%');

        });
    }

    // FILTRO CATEGORIA
    if ($request->category_id) {

        $query->where('category_id', $request->category_id);

    }

    // ORDENAMIENTO
    if ($request->sort == 'price_asc') {

        $query->orderBy('price', 'asc');

    }

    if ($request->sort == 'price_desc') {

        $query->orderBy('price', 'desc');

    }

    if ($request->sort == 'stock') {

        $query->orderBy('stock', 'desc');

    }

    $products = $query->get();

    $categories = Category::all();

    return view('products.index', compact(
        'products',
        'categories'
    ));
}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
   $request->validate(

    [
            'name' => 'required',
            'sku' => 'required|unique:products,sku',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:0',
            'category_id' => 'required|exists:categories,id'
    ],

    [
        'price.min' => 'El precio debe ser mayor a 0.',
        'stock.min' => 'El stock no puede ser negativo.'
    ],
    [
        'price' => 'precio',
        'stock' => 'stock',
        'name' => 'nombre',
        'sku' => 'SKU',
        'category_id' => 'categoría'
    ]

);
    Product::create($request->all());

    return redirect()
        ->route('products.index')
        ->with('success', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
{
    $categories = Category::all();

    return view('products.edit', compact('product', 'categories'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([

        'name' => 'required',

        'sku' => 'required|unique:products,sku,' . $product->id,

        'price' => 'required|numeric|min:1',

        'stock' => 'required|integer|min:0',

        'category_id' => 'required'

    ]);

    $product->update($request->all());

    return redirect()
        ->route('products.index')
        ->with('success', 'Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
        ->with('success', 'Producto eliminado');
    }
}
