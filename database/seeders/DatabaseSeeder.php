<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed role and permission
        $this->call(RolePermissionSeeder::class);
        // ------------------------

        // seed super user
        $user = \App\Models\User::create(['name' => "Dipankar", 'email' => "dipankar@email.com", 'email_verified_at' => now(), 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'remember_token' => Str::random(10)]);
        $user->assignRole('super admin');
        // ------------------------

        // seed application session
        $this->call(ApplicationSessionSeeder::class);
        // ------------------------

        // seed currency 
        $this->call(CurrencySeeder::class);
        // ------------------------

        // seed order status 
        $this->call(OrderStatusSeeder::class);
        // ------------------------
        
        // seed payment status  
        $this->call(PaymentStatusSeeder::class);
        // ------------------------
        
        // seed payment mode 
        $this->call(PaymentModeSeeder::class);
        // ------------------------

        // seed system settion 
        $this->call(SystemSettionSeeder::class);
        // ------------------------
    }
}
