<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "admin_id" => 1,
            "name" => $this->faker->name(),
            "price" => $this->faker->numberBetween(1, 666),
            "category_id" => $this->faker->numberBetween(7, 12),
            "image" => "productscontrollrt/defaut.jpg"
        ];
    }
}
