<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\PartnerSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\AppCapitalSeeder;
use Stocks\Database\Seeders\SaleSeeder;
use Database\Seeders\NotificationSeeder;
use Clients\Database\Seeders\ClientSeeder;
use Stocks\Database\Seeders\ExpenseSeeder;
use Stocks\Database\Seeders\ProductSeeder;
use Users\Database\Seeders\UsersTableSeeder;
use Users\Database\Seeders\UserWalletSeeder;
use Stocks\Database\Seeders\ExpenseTypeSeeder;
use Suppliers\Database\Seeders\SupplierSeeder;
use Stocks\Database\Seeders\InstallementSeeder;
use Suppliers\Database\Seeders\PriceListSeeder;
use Clients\Database\Seeders\ClientWalletSeeder;
use Suppliers\Database\Seeders\SupplierWalletSeeder;
use Users\Database\Seeders\UserWalletTransactionSeeder;
use Clients\Database\Seeders\ClientWalletTransactionSeeder;
use Suppliers\Database\Seeders\SupplierWalletTransactionSeeder;
use Users\Database\Seeders\SettingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(
            [
                UsersTableSeeder::class,
                UserWalletSeeder::class,
                UserWalletTransactionSeeder::class,
                ClientSeeder::class,
                ClientWalletSeeder::class,
                ClientWalletTransactionSeeder::class,
                SupplierSeeder::class,
                SupplierWalletSeeder::class,
                SupplierWalletTransactionSeeder::class,
                CategorySeeder::class,
                BrandSeeder::class,
                ProductSeeder::class,
                SaleSeeder::class,
                AppCapitalSeeder::class,
                ExpenseTypeSeeder::class,
                ExpenseSeeder::class,
                InstallementSeeder::class,
                NotificationSeeder::class,
                PartnerSeeder::class,
                PriceListSeeder::class,
                SettingSeeder::class
            ]
        );
    }
}
