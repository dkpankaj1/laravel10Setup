<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataArrey =[
            ['name' => 'Pending','description' => ''],
            ['name' => 'Partial','description' => ''],
            ['name' => 'Paid','description' => ''],
        ];
        DB::table('paymeny_statuses')->insert($dataArrey);
    }
}
