<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            // Produk untuk Laki-laki
            [
                'item_purchased' => 'Jacket',
                'category' => 'Outerwear',
                'season' => 'Winter',
                'gender' => 'Male',
                'price' => 400000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'T-shirt',
                'category' => 'Clothing',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 90000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Boots',
                'category' => 'Footwear',
                'season' => 'Winter',
                'gender' => 'Male',
                'price' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Sandals',
                'category' => 'Footwear',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 110000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Sunglasses',
                'category' => 'Accessories',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Produk untuk Perempuan
            [
                'item_purchased' => 'Coat',
                'category' => 'Outerwear',
                'season' => 'Winter',
                'gender' => 'Female',
                'price' => 450000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Dress',
                'category' => 'Clothing',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Heels',
                'category' => 'Footwear',
                'season' => 'Winter',
                'gender' => 'Female',
                'price' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Flats',
                'category' => 'Footwear',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 130000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Hat',
                'category' => 'Accessories',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
