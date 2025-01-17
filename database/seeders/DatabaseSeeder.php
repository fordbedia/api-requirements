<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            PriceSeeder::class,
        ]);
    }
}
