<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['title' => 'Electronics']);
        Category::create(['title' => 'Home Appliances']);
        Category::create(['title' => 'Computers']);
        Category::create(['title' => 'Smartphones']);
        Category::create(['title' => 'Gaming']);
    }
    
}
