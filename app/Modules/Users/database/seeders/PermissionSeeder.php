<?php

namespace Users\Database\Seeders;

use Users\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    // php artisan db:seed --class=Users\Database\Seeders\PermissionSeeder --force
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::insert([
            ['name'=>'Create Product','guard_name'=>'web'],
            ['name'=>'Update Product','guard_name'=>'web'],
            ['name'=>'Delete Product','guard_name'=>'web'],
            ['name'=>'Read Product','guard_name'=>'web']
        ]);
    }
}
