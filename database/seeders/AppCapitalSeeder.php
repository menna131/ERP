<?php

namespace Database\Seeders;

use App\Models\AppCapital;
use Illuminate\Database\Seeder;

class AppCapitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AppCapital::factory(10)->create();
    }
}
