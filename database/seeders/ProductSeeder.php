<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'category_id' => 1,
            'name' => 'Nasi Ayam Bakar',
            'thumbnail' => 'ayam-bakar.jpg',
            'price' => 24000,
            'body' => 'Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar',
        ]);
        Product::create([
            'category_id' => 1,
            'name' => 'Nasi Ayam Bakar',
            'thumbnail' => 'ayam-bakar.jpg',
            'price' => 24000,
            'body' => 'Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar',
        ]);
        Product::create([
            'category_id' => 2,
            'name' => 'Nasi Ayam Bakar',
            'thumbnail' => 'ayam-bakar.jpg',
            'price' => 24000,
            'body' => 'Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar',
        ]);
        Product::create([
            'category_id' => 3,
            'name' => 'Nasi Ayam Bakar',
            'thumbnail' => 'ayam-bakar.jpg',
            'price' => 24000,
            'body' => 'Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar',
        ]);
        Product::create([
            'category_id' => 4,
            'name' => 'Nasi Ayam Bakar',
            'thumbnail' => 'ayam-bakar.jpg',
            'price' => 24000,
            'body' => 'Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar',
        ]);
        Product::create([
            'category_id' => 5,
            'name' => 'Nasi Ayam Bakar',
            'thumbnail' => 'ayam-bakar.jpg',
            'price' => 24000,
            'body' => 'Nasi, Sayur Komplit, Sambal Ijo Ayam Bakar',
        ]);
    }
}
