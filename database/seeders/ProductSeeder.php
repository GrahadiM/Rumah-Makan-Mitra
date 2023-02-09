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
            'category_id'   => 1,
            'name'          => 'Nasi Ayam Bakar',
            'thumbnail'     => 'ayam-bakar.jpg',
            'price'         => 15000,
            'body'          => 'Nasi, Sambal Ijo, Ayam Bakar',
            'favorite'      => 'true',
        ]);
        Product::create([
            'category_id'   => 1,
            'name'          => 'Nasi Ayam Gulai',
            'thumbnail'     => 'ayam-gulai.jpg',
            'price'         => 15000,
            'body'          => 'Nasi, Sambal Ijo, Ayam Gulai',
            'favorite'      => 'false',
        ]);
        Product::create([
            'category_id'   => 1,
            'name'          => 'Nasi Ayam Goreng',
            'thumbnail'     => 'ayam-goreng.jpg',
            'price'         => 15000,
            'body'          => 'Nasi, Sambal Ijo Ayam Bakar',
            'favorite'      => 'true',
        ]);
        Product::create([
            'category_id'   => 2,
            'name'          => 'Perkedel',
            'thumbnail'     => 'perkedel.jpg',
            'price'         => 2000,
            'body'          => 'Perkedel',
            'favorite'      => 'false',
        ]);
        Product::create([
            'category_id'   => 3,
            'name'          => 'Ayam Bakar',
            'thumbnail'     => 'ayam-bakar.jpg',
            'price'         => 8000,
            'body'          => 'Ayam Bakar',
            'favorite'      => 'false',
        ]);
        Product::create([
            'category_id'   => 5,
            'name'          => 'Es Teh Tawar',
            'thumbnail'     => 'teh-tawar.jpg',
            'price'         => 2000,
            'body'          => 'Es atau Panas Teh Tawar',
            'favorite'      => 'false',
        ]);
        Product::create([
            'category_id'   => 5,
            'name'          => 'Es Teh Manis',
            'thumbnail'     => 'es-teh-manis.jpg',
            'price'         => 3000,
            'body'          => 'Es atau Panas Teh Manis',
            'favorite'      => 'true',
        ]);
        Product::create([
            'category_id'   => 5,
            'name'          => 'Es Jeruk',
            'thumbnail'     => 'jeruk.jpg',
            'price'         => 5000,
            'body'          => 'Es atau Panas Jeruk',
            'favorite'      => 'false',
        ]);
    }
}
