<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SystemSetting;

class SystemSettionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $systemSetting = [
            'name'                  => "system",
            'company_name'          => "test",
            'company_email'         => "test@email.com",
            'company_phone'         => "+91 9794445940",
            'company_address'       => "Test Company Name",
            'time_zone'             => "" ,
            'date_format'           => "",
            'default_app_session'   => 1,
            'default_currency'      => 1
        ];

        SystemSetting::create($systemSetting);
    }
}
