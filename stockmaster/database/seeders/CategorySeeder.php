<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create([
            'name' => 'Electrónica',
            'description' => 'Productos electrónicos'
        ]);

        Category::create([
            'name' => 'Papelería',
            'description' => 'Artículos escolares'
        ]);

        Category::create([
            'name' => 'Hogar',
            'description' => 'Productos del hogar'
        ]);
    }
}