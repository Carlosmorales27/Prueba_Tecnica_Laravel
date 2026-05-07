<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $categories = Category::all();

    return view('categories.index', compact('categories'));
}

public function create()
{
    return view('categories.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required'
    ]);

    Category::create($request->all());

    return redirect()
        ->route('categories.index')
        ->with('success', 'Categoría creada correctamente');
}

public function edit(Category $category)
{
    return view('categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required'
    ]);

    $category->update($request->all());

    return redirect()
        ->route('categories.index')
        ->with('success', 'Categoría actualizada');
}

public function destroy(Category $category)
{
    $category->delete();

    return redirect()
        ->route('categories.index')
        ->with('success', 'Categoría eliminada');
}
}
