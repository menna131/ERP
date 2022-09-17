<?php

namespace Clients\Database\Factories;

use Clients\Models\Client;
use Clients\Models\ClientWallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientWalletFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientWallet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'client_id' => Client::all()->random()->id,
            'total_paid' => $this->faker->randomNumber(5,true),
            'total_pending'=>$this->faker->randomNumber(5,false),
            'status'=>$this->faker->boolean(),
            'number_of_transaction'=>'5',
            'total_value'=>$this->faker->randomNumber(5,false),
            // 'reminder_day'=>$this->faker->date('Y-m-d','now'),
            'slug' => $this->faker->slug(),
        ];
    }
}
