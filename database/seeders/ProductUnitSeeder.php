<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductUnit;

class ProductUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultProduct = ProductUnit::create(['name' => 'Pice', 'short_name' => "PC", 'operator' => '*', 'description' => 'Item in PC']);
        ProductUnit::create(['name' => 'Pakage', 'short_name' => "PACKET", 'operator' => '/', 'description' => 'Item in Packet', 'base_unit' => $defaultProduct->id]);
    }
}
