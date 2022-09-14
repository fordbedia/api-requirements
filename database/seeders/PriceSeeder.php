<?php

namespace Database\Seeders;

use App\Models\Products\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::factory()->count(20)->create();
    }
}
