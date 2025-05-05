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
                'picture' => 'https://isto.pt/cdn/shop/files/Classic_T-shirt_Black_1_4b42b483-c2cf-46f6-805c-90bd905b4338.webp?v=1742902194',
            ],
            [
                'item_purchased' => 'Boots',
                'category' => 'Footwear',
                'season' => 'Winter',
                'gender' => 'Male',
                'price' => 300000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => 'https://testrunnercom.b-cdn.net/wp-content/uploads/2024/10/asics-novablast-5-01.jpg',
            ],
            [
                'item_purchased' => 'Sandals',
                'category' => 'Footwear',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 110000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => 'https://assets.adidas.com/images/w_383,h_383,f_auto,q_auto,fl_lossy,c_fill,g_auto/c3de3a40507e48a0aad7a80e010fbb08_9366/adilette-comfort-slides.jpg',
            ],
            [
                'item_purchased' => 'Sunglasses',
                'category' => 'Accessories',
                'season' => 'Summer',
                'gender' => 'Male',
                'price' => 80000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => 'https://images.evo.com/imgp/700/225779/914406/oakley-sutro-lite-sweep-sunglasses-.jpg',
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
                'picture' => 'https://www.danezon.com/wp-content/uploads/2020/07/Mens-Brown-Mid-Length-Wool-Coat.jpg',
            ],
            [
                'item_purchased' => 'Dress',
                'category' => 'Clothing',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => 'https://ae01.alicdn.com/kf/HTB1ig.EJrSYBuNjSspfq6AZCpXa1/Gamiss-Audrey-Hepburn-Vintage-Party-Dress-Women-Floral-Flare-Midi-Dresses-Winter-Spring-Retro-Elegant-Dress.jpg',
            ],
            [
                'item_purchased' => 'Heels',
                'category' => 'Footwear',
                'season' => 'Winter',
                'gender' => 'Female',
                'price' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => 'https://i.pinimg.com/originals/c4/9a/b9/c49ab9737bff03516240b6819ff8801d.jpg',
            ],
            [
                'item_purchased' => 'Flats',
                'category' => 'Footwear',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 130000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => 'https://th.bing.com/th/id/OIP.seaUem4L_n4m8aX8QkE1SQHaHa?rs=1&pid=ImgDetMain',
            ],
            [
                'item_purchased' => 'Hat',
                'category' => 'Accessories',
                'season' => 'Summer',
                'gender' => 'Female',
                'price' => 70000,
                'created_at' => now(),
                'updated_at' => now(),
                'picture' => 'https://th.bing.com/th/id/OIP.siiH7qJCK7ReXnjGa-upLgHaF7?rs=1&pid=ImgDetMain',
            ],
        ]);
    }
}
