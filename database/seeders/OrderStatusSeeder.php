<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataArrey =[
            ['name' => 'Pending','description' => ''],
            ['name' => 'Ordered','description' => ''],
            ['name' => 'Complete','description' => ''],
        ];
        DB::table('order_statuses')->insert($dataArrey);
    }
}
