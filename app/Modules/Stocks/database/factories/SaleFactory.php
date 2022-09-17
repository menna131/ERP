<?php

namespace Stocks\Database\Factories;

use Stocks\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

class SaleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name('male'),
            'type' => $this->faker->name(),
            'status' => $this->faker->boolean(),
            'create_status' => $this->faker->name(),
            'note' => $this->faker->sentence(),
            'discount' => $this->faker->randomFloat(2, 0, 10000),
            'total' => $this->faker->randomFloat(2, 0, 10000),
            'receive_date' => $this->faker->dateTime(),
            'order_date' => $this->faker->dateTime(),
            'slug' => $this->faker->slug(),
        ];
    }
}
