<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'company_name',
        'company_email',
        'company_phone',
        'company_address',
        'time_zone',
        'date_format',
        'default_warehouse',
        'default_app_session',
        'default_currency'
    ];
}
