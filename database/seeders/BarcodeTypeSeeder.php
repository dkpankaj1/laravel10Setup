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
        BarcodeType::create(['name' => 'Code 39','description' =>'null']);
        BarcodeType::create(['name' => 'Code 128','description' =>'null']);
        BarcodeType::create(['name' => 'Interleaved 2 of 5','description' =>'null']);
        BarcodeType::create(['name' => 'Universal Product Codes (UPC)','description' =>'null']);
        BarcodeType::create(['name' => 'International Article Number (EAN)','description' =>'null']);
        BarcodeType::create(['name' => 'PDF417','description' =>'null']);
        BarcodeType::create(['name' => 'Data Matrix','description' =>'null']);
        BarcodeType::create(['name' => 'Quick Response (QR) Codes','description' =>'null']);
    }
}
