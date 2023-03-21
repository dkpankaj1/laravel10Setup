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
        BarcodeType::create(['name' => 'C39+','description' =>'null']);
        BarcodeType::create(['name' => 'C39E','description' =>'null']);
        BarcodeType::create(['name' => 'C39E+','description' =>'null']);
        BarcodeType::create(['name' => 'C93','description' =>'null']);
        BarcodeType::create(['name' => 'S25','description' =>'null']);
        BarcodeType::create(['name' => 'S25+','description' =>'null']);
        BarcodeType::create(['name' => 'I25','description' =>'null']);
        BarcodeType::create(['name' => 'I25+','description' =>'null']);
        BarcodeType::create(['name' => 'C128','description' =>'null']);
        BarcodeType::create(['name' => 'C128A','description' =>'null']);
        BarcodeType::create(['name' => 'C128B','description' =>'null']);
        BarcodeType::create(['name' => 'C128C','description' =>'null']);
        BarcodeType::create(['name' => 'EAN2','description' =>'null']);
        BarcodeType::create(['name' => 'EAN5','description' =>'null']);
        BarcodeType::create(['name' => 'EAN8','description' =>'null']);
        BarcodeType::create(['name' => 'EAN13','description' =>'null']);
        BarcodeType::create(['name' => 'UPCA','description' =>'null']);
        BarcodeType::create(['name' => 'UPCE','description' =>'null']);
        BarcodeType::create(['name' => 'MSI','description' =>'null']);
        BarcodeType::create(['name' => 'MSI+','description' =>'null']);
        BarcodeType::create(['name' => 'POSTNET','description' =>'null']);
        BarcodeType::create(['name' => 'PLANET','description' =>'null']);
        BarcodeType::create(['name' => 'RMS4CC','description' =>'null']);
        BarcodeType::create(['name' => 'KIX','description' =>'null']);
        BarcodeType::create(['name' => 'IMB','description' =>'null']);
        BarcodeType::create(['name' => 'CODABAR','description' =>'null']);
        BarcodeType::create(['name' => 'CODE11','description' =>'null']);
        BarcodeType::create(['name' => 'PHARMA','description' =>'null']);
        BarcodeType::create(['name' => 'PHARMA2T','description' =>'null']);

    }
}
