<?php

namespace Database\Factories\Products;

use App\Models\Products\Product;
use App\Models\Products\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    private $sku = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sku' => '00000'.$this->sku++,
            'name' => $this->faker->word(),
            'cid' => Category::inRandomOrder()->first()->cid
        ];
    }
}
