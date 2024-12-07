<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan 15 data produk ke tabel products
        DB::table('products')->insert([
            [
                'item_purchased' => 'Sweater',
                'category' => 'Clothing',
                'season' => 'Winter',
                'gender' => 'Female',
                'price' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'T-shirt',
                'category' => 'Clothing',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Sneakers',
                'category' => 'Footwear',
                'season' => 'Spring',
                'gender' => 'Male',
                'price' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Coat',
                'category' => 'Outerwear',
                'season' => 'Winter',
                'gender' => 'Female',
                'price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Jacket',
                'category' => 'Outerwear',
                'season' => 'Winter',
                'gender' => 'Female',
                'price' => 350000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Boots',
                'category' => 'Footwear',
                'season' => 'Winter',
                'gender' => 'Female',
                'price' => 400000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Hoodie',
                'category' => 'Clothing',
                'season' => 'Winter',
                'gender' => 'Male',
                'price' => 350000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Blouse',
                'category' => 'Clothing',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Sandals',
                'category' => 'Footwear',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Shorts',
                'category' => 'Clothing',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Sunglasses',
                'category' => 'Accessories',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Tennis Shoes',
                'category' => 'Footwear',
                'season' => 'Spring',
                'gender' => 'Female',
                'price' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Raincoat',
                'category' => 'Outerwear',
                'season' => 'Fall',
                'gender' => 'Male',
                'price' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_purchased' => 'Vest',
                'category' => 'Outerwear',
                'season' => 'Fall',
                'gender' => 'Female',
                'price' => 120000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}


