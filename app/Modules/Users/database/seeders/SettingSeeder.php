<?php

namespace Users\Database\Seeders;

use Illuminate\Database\Seeder;
use Users\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'name' => NULL,
            'phone' => NULL,
            'image' => NULL,
            'open_account' => NULL,
            'preferred_language' => NULL,
            'preferred_theme' => NULL, 
            'status' => 0,
        ]);
    }
}
