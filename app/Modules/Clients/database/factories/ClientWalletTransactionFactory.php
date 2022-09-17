<?php

namespace Clients\Database\Factories;

use Clients\Models\Client;
use Clients\Models\ClientWallet;
use Clients\Models\ClientWalletTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientWalletTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClientWalletTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_wallet_id'=>ClientWallet::all()->random()->id,
            'reason'=>$this->faker->sentence(10),
            'transaction_date'=>$this->faker->date('y-m-d','now'),
            'client_wallet_transactionable_type'=>$this->faker->sentence(10),
            'client_wallet_transactionable_id' =>$this->faker->randomNumber(5, false),
            'transaction_status'=>$this->faker->boolean(),
            'amount'=>$this->faker->randomNumber(5, false),
        ];
    }
}
