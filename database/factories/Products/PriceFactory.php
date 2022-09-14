<?php

namespace Database\Factories\Products;

use App\Models\Products\Price;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Products\Product;

class PriceFactory extends Factory
{
    protected $model = Price::class;

    private $priceId = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $price = $this->faker->randomNumber(5, true);

        return [
            'productid' => $this->priceId++,
            'original' => $price,
            'final' => $price,
            'discount_percentage' => null,
            'currency' => 'EUR'
        ];
    }
}
