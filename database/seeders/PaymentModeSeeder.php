<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataArrey =[
            ['name' => 'Cash','description' => ''],
            ['name' => 'Cheque','description' => ''],
            ['name' => 'Online','description' => ''],
        ];
        DB::table('paymeny_modes')->insert($dataArrey);
    }
}
