<?php

namespace Users\Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;


class SettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Setting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name(),
            // 'phone' => $this->faker->randomDigit(),
            // 'image' => $this->faker->image(null, 640, 480),
            // 'open_account' => $this->faker->integer,
            // 'preferred_language' => ,
            // 'preferred_theme' => ,
        ];
    }
}