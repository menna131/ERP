<?php

namespace Database\Factories;

use App\Models\AppCapital;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppCapitalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AppCapital::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'month' => $this->faker->date(),
            'capital' => $this->faker->randomFloat(2, 1000, 2000),
            'monthly_profit' => $this->faker->randomFloat(2, 1000, 2000),
            'capital_after_divided' => $this->faker->randomFloat(2, 1000, 2000),
            'money_percent_type' => $this->faker->name(),
            'status' => $this->faker->numberBetween(0,1)
        ];
    }
}
