<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'rio',
        //     'password' => 'root',
        // ]);
        
        $this->call([
            ProductSeeder::class,
            PurchaseSeeder::class,  // Jika ingin memasukkan data purchase juga
        ]);


    }
}

