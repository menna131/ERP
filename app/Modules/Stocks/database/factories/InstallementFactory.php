<?php

namespace Stocks\Database\Factories;

use Stocks\Models\Installement;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstallementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Installement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'paid_amount' => $this->faker->randomFloat(2, 1000, 2000),
            'installement_period' => $this->faker->randomFloat(2, 1000, 2000),
            'installementable_id' => $this->faker->randomDigit(),
            'installementable_type' => $this->faker->name(),
            'down_payment' => $this->faker->randomFloat(2, 1000, 2000),
            'per' => $this->faker->randomDigit(),
            'start_date' => $this->faker->date(),
            'installment_type' => $this->faker->name(),
            'no_transaction' => $this->faker->randomDigit()
        ];
    }
}
