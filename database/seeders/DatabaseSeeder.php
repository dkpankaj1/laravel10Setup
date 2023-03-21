<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BarcodeType;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\TexType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 
        Category::create(['name' => 'uncategorie', 'description' => "test"]);
        Category::create(['name' => 'uncategorie-1', 'description' => "test"]);
        Category::create(['name' => 'uncategorie-2', 'description' => "test"]);
        // 

        /**
         * ---------------------------
         * Begin Master Table Seeder
         * --------------------------
         */

        $this->call(ApplicationSessionSeeder::class);
        $this->call(BarcodeTypeSeeder::class);
        $this->call(BarcodePaperSizeSeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(PaymentStatusSeeder::class);
        $this->call(PaymentModeSeeder::class);
        $this->call(ProductUnitSeeder::class);
        $this->call(TexTypeSeeder::class);

        /**
         * ---------------------------
         * End Master Table Seeder
         * --------------------------
         */


        // seed role and permission
        $this->call(RolePermissionSeeder::class);
        // ------------------------

        // seed super user
        $user = \App\Models\User::create(['name' => "Dipankar", 'email' => "dipankar@email.com", 'email_verified_at' => now(), 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'login_enable' => 1, 'remember_token' => Str::random(10)]);
        $user->assignRole('super admin');
        // ------------------------

        // seed system settion 
        $this->call(SystemSettionSeeder::class);
        // ------------------------


        // seed product 
        $this->call(ProductSeeder::class);
        // ------------------------

        
    }
}
