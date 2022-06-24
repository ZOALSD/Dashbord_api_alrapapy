<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "admin_id" => 1 ,
"name" => $this->faker->name(),
"price" => $this->faker->rand(1,66),
"category_id" => $this->faker->random_int(7,17),
"image" => ""
        ];
    }
}
