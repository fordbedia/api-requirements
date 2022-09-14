<?php

namespace Database\Factories\Products;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $inc_category = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cat = $this->category()[$this->inc_category++];
        return [
            'name' => $cat,
            'slug' => Str::slug($cat)
        ];
    }

    /**
     * Define Category
     *
     * @return void
     */
    protected function category()
    {
        return [
            'Computers',
            'Software',
            'Food',
            'Magazine',
            'Insurance'
        ];
    }
}
