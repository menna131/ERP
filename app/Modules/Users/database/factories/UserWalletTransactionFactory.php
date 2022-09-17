<?php

namespace Users\Database\Factories;

use Users\Models\User;
use Users\Models\UserWallet;
use Users\Models\UserWalletTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserWalletTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserWalletTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_wallet_id'=>UserWallet::all()->random()->id,
            // 'reason'=>$this->faker->sentence(10),
            // 'transaction_date'=>$this->faker->date('y-m-d','now'),
            // 'user_wallet_transactionable_type'=>$this->faker->sentence(10),
            // 'user_wallet_transactionable_id' => $this->faker->randomNumber(5, false),
            // 'transaction_status'=>$this->faker->boolean(),
            // 'amount'=>$this->faker->randomNumber(5, false),
        ];
    }
}
