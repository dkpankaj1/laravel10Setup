<?php

namespace App\Providers;

use App\Http\Controllers\BaseController;
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
        try {
            $system_setting = SystemSetting::first();

            if (!session()->has(config('app.appSession'))) {

                if (!is_null($system_setting->default_app_session)) {

                    $appSession = ApplicationSession::find($system_setting->default_app_session);
                } else {

                    $appSession = ApplicationSession::first();
                }

                session()->put(config('app.appSession'), ["id" => $appSession->id, "name" => $appSession->name]);
            }
        } catch (\Exception $e) {

            echo $e->getMessage();
        }


        View::share("appSessionList", ApplicationSession::all());
    }
}
