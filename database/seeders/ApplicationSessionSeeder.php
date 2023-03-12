<?php

namespace Database\Seeders;

use App\Models\ApplicationSession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ApplicationSession::create(['name'=>'2020',"description" => "no description"]);
        ApplicationSession::create(['name'=>'2021',"description" => "no description"]);
        ApplicationSession::create(['name'=>'2022',"description" => "no description"]);
        ApplicationSession::create(['name'=>'2023',"description" => "no description"]);
    }
}
