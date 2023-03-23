<?php

namespace Database\Seeders;

use App\Models\BarcodeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarcodeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BarcodeType::create(['name' => 'C39','description' =>'null']);
        BarcodeType::create(['name' => 'C93','description' =>'null']);
        BarcodeType::create(['name' => 'C128','description' =>'null']);
        BarcodeType::create(['name' => 'EAN8','description' =>'null']);
        BarcodeType::create(['name' => 'EAN13','description' =>'null']);
        BarcodeType::create(['name' => 'UPCA','description' =>'null']);
        BarcodeType::create(['name' => 'UPCE','description' =>'null']);
    }
}
