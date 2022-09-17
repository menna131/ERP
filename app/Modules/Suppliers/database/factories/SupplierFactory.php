<?php

namespace Suppliers\Database\Factories;

use Suppliers\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Supplier::class;

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
            'address' =>$this->faker->name(),
            'media' =>strtotime(date("Y-m-d H:i:s")).'.pdf',
            'phone'=>$this->faker->unique()->phoneNumber(),
            'slug' => $this->faker->slug(),
        ];
    }
}
