<?php

namespace Stocks\Database\Factories;

use Stocks\Models\ExpenseType;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExpenseType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->name(),
            'slug' => $this->faker->slug()
        ];
    }
}
