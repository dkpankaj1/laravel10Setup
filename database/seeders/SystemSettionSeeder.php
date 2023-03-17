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
            'time_zone'             => null,
            'date_format'           => null,
            'default_warehouse'     => null,
            'current_app_session'   => 4,
            'default_app_session'   => null,
            'default_currency'      => null
        ];

        SystemSetting::create($systemSetting);
    }
}
