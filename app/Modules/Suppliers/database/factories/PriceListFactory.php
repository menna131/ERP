<?php

namespace Suppliers\Database\Factories;

use Suppliers\Models\Supplier;
use Suppliers\Models\PriceList;
use Illuminate\Database\Eloquent\Factories\Factory;

class PriceListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PriceList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 1000, 2000),
            'made_in' => $this->faker->name(),
            'notes'=>$this->faker->sentence(),
            'supplier_id' => Supplier::all()->random()->id,
            'slug' => $this->faker->slug(),

        ];
    }
}
