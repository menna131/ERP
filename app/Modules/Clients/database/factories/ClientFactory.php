<?php

namespace Clients\Database\Factories;

use Clients\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'nickname' => $this->faker->name(),
            'address' => $this->faker->name(),
            'phone'=>$this->faker->unique()->phoneNumber(),
            'slug' => $this->faker->slug(),
        ];
    }
}
