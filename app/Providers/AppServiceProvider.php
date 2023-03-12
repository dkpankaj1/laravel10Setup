<?php

namespace App\Providers;

use App\Models\ApplicationSession;
use App\Models\SystemSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $system_setting = SystemSetting::first();

        if (!session()->has('appSession')) {
            $appSession = ApplicationSession::find($system_setting->default_app_session);
            session()->put("appSession", ["id" => $appSession->id, "name" => $appSession->name]);
        }
        
        View::share("appSessionList", ApplicationSession::all());
    }
}
