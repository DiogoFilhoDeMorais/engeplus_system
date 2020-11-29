<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeed as User;
use Database\Seeders\CommissionSeed as Commission;
use Database\Seeders\ProductSeed as Product;
use Database\Seeders\ServiceSeed as Service;
use Database\Seeders\SellingProductSeed as SellingProduct;
use Database\Seeders\SellingServiceSeed as SellingService;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(3)->create();
        $this->call(User::class);
        $this->call(Commission::class);
        $this->call(Product::class);
        $this->call(Service::class);
        $this->call(SellingProduct::class);
        $this->call(SellingService::class);
    }
}
