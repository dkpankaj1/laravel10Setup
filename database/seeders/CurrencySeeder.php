<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->insert([
            ['name'=>"Indian Rupees",'code' => "INR",'symbol' => "₹",'description' => "Indian Rupees(INR) "],
            ['name'=>"USA Doller",'code' => "USD",'symbol' => "$",'description' => "USA Doller(USD) "],
        ]);
    }
}
