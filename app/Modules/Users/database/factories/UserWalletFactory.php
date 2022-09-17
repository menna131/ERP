<?php

namespace Users\Database\Factories;

use Users\Models\User;
use Users\Models\UserWallet;
use Users\Models\UserWalletTrans;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserWalletFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserWallet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            // 'user_id' => 1,
            // 'total_paid' => 0,
            // 'total_pending'=>0,
            // 'status'=>$this->faker->boolean(),
            // 'number_of_transaction'=>0,
            // 'total_value'=>0,
            // 'slug' => User::find(1)->slug,
        ];
    }
}
