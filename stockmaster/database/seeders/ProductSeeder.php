<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([

            'name' => 'Laptop HP',

            'sku' => 'HP-001',

            'price' => 15000,

            'stock' => 10,

            'category_id' => 1

        ]);

        Product::create([

            'name' => 'Mouse Logitech',

            'sku' => 'LOG-001',

            'price' => 500,

            'stock' => 25,

            'category_id' => 1

        ]);

        Product::create([

            'name' => 'Cuaderno Profesional',

            'sku' => 'CUAD-001',

            'price' => 80,

            'stock' => 50,

            'category_id' => 2

        ]);

        Product::create([

            'name' => 'Silla de Oficina',

            'sku' => 'HOME-001',

            'price' => 2500,

            'stock' => 5,

            'category_id' => 3

        ]);
    }
}