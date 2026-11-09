<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Samsung Smart TV 55"',
            'price' => 185000,
            'image' => 'https://via.placeholder.com/400x300',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'Sony Sound Bar',
            'price' => 45000,
            'image' => 'https://via.placeholder.com/400x300',
            'category_id' => 1,
        ]);

        Product::create([
            'name' => 'LG Refrigerator 250L',
            'price' => 120000,
            'image' => 'https://via.placeholder.com/400x300',
            'category_id' => 2,
        ]);

        Product::create([
            'name' => 'HP Laptop i5 11th Gen',
            'price' => 230000,
            'image' => 'https://via.placeholder.com/400x300',
            'category_id' => 3,
        ]);

        Product::create([
            'name' => 'iPhone 14 128GB',
            'price' => 345000,
            'image' => 'https://via.placeholder.com/400x300',
            'category_id' => 4,
        ]);
    }
}
