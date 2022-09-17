<?php

namespace Suppliers\Database\Factories;
use Suppliers\Models\Supplier;
use Suppliers\Models\SupplierWallet;
use Suppliers\Models\SupplierWalletTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierWalletTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SupplierWalletTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'supplier_wallet_id'=>SupplierWallet::all()->random()->id,
            'reason'=>$this->faker->randomNumber(1),
            'transaction_date'=>$this->faker->date('y-m-d','now'),
            'supplier_wallet_transactionable_type'=>$this->faker->sentence(10),
            'supplier_wallet_transactionable_id' =>$this->faker->randomNumber(5, false),
            'transaction_status'=>$this->faker->boolean(),
            'amount'=>$this->faker->randomNumber(5, false),
        ];
    }
}
