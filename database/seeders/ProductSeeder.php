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
                'picture' => 'https://media.istockphoto.com/id/163208487/photo/male-coat-isolated-on-the-white.jpg?s=612x612&w=0&k=20&c=3Sdq5xnVS2jOYPNXI6JLwAumzyelcP_VgKVW0MVUhwo=',
            ],
            [
                'item_purchased' => 'T-shirt',
                'category' => 'Clothing',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 90000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => '...',
            ],
            [
                'item_purchased' => 'Boots',
                'category' => 'Footwear',
                'season' => 'Winter',
                'gender' => 'Male',
                'price' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => '...',
            ],
            [
                'item_purchased' => 'Sandals',
                'category' => 'Footwear',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 110000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => '...',
            ],
            [
                'item_purchased' => 'Sunglasses',
                'category' => 'Accessories',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => '...',
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
                'picture' => '...',
            ],
            [
                'item_purchased' => 'Dress',
                'category' => 'Clothing',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => '...',
            ],
            [
                'item_purchased' => 'Heels',
                'category' => 'Footwear',
                'season' => 'Winter',
                'gender' => 'Female',
                'price' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => '...',
            ],
            [
                'item_purchased' => 'Flats',
                'category' => 'Footwear',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 130000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => '...',
            ],
            [
                'item_purchased' => 'Hat',
                'category' => 'Accessories',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => '...',
            ],
        ]);
    }
}
