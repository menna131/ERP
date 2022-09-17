<?php

namespace Suppliers\Database\Factories;
use Suppliers\Models\Supplier;
use Suppliers\Models\SupplierWallet;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierWalletFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SupplierWallet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'supplier_id' => Supplier::all()->random()->id,
            'total_paid' => $this->faker->randomNumber(5,true),
            'total_pending'=>$this->faker->randomNumber(5,false),
            'status'=>$this->faker->boolean(),
            'number_of_transaction'=>'5',
            'total_value'=>$this->faker->randomNumber(5,false),
            'slug' => $this->faker->slug(),
        ];
    }
}
