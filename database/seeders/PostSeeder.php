<?php

namespace Database\Seeders;
use App\Models\Post;  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 
    public function run()
    {
        Post::insert([
            ['title'=>'TechMart Launch', 'description'=>'TechMart is now open with great deals!'],
            ['title'=>'Top 5 Gadgets', 'description'=>'Check out the best gadgets this month.'],
            ['title'=>'Smart Home Tips', 'description'=>'Make your home smarter with these tips.'],
            ['title'=>'Energy Efficient Electronics', 'description'=>'Save energy with these electronics.'],
        ]);
    }
}
