<?php

namespace Database\Factories;

use Stocks\Models\Installement;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Notification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'read' => $this->faker->numberBetween(0,1),
            'date' => $this->faker->date(),
            'title' => $this->faker->name(),
            'content' => $this->faker->sentence(10),
            'notificationable_id' => $this->faker->randomDigit(),
            'notificationable' => $this->faker->name(),
            'installment_id' => Installement::all()->random()->id
        ];
    }
}
