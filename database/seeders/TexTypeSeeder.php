<?php

namespace Database\Seeders;

use App\Models\TexType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TexTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TexType::create(['name' => 'inclusive', 'type' => 1, 'description' => '']);
        TexType::create(['name' => 'exclusive', 'type' => 0, 'description' => '']);
    }
}
