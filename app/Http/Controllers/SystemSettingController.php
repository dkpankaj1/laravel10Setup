<?php

namespace App\Http\Controllers;

use App\Models\ApplicationSession;
use App\Models\Currency;
use App\Models\SystemSetting;
use App\Models\Warehouse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class SystemSettingController extends BaseController
{
    protected $defaultTimeZone      =   ['(UTC+05:30) Asia/Kolkata'];
    protected $defaultDateFormat    =   ['MM/DD/YYYY', 'DD/MM/YYYY', 'MM-DD-YYYY', 'DD-MM-YYYY'];


    /**
     * Display the specified resource.
     */
    public function show(SystemSetting $systemSetting): View
    {
        $this->checkAuthorizetion('system.settion.show');

        $defaultTimeZone = $this->defaultTimeZone;
        $defaultDateFormat = $this->defaultDateFormat;
        $appSessions = ApplicationSession::all();
        $currencys = Currency::all();
        $warehouses = Warehouse::all();

        return view('setting.system', compact(
            'systemSetting',
            'defaultTimeZone',
            'defaultDateFormat',
            'warehouses',
            'appSessions',
            'currencys'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SystemSetting $systemSetting): RedirectResponse
    {
        $this->checkAuthorizetion('system.settion.edit');

        $validated = $request->validate([
            'company_name'          => ['required'],
            'company_email'         => ['required', 'email'],
            'company_phone'         => ['required'],
            'company_address'       => ['required'],
            'time_zone'             => ['required', Rule::in($this->defaultTimeZone)],
            'date_format'           => ['required', Rule::in($this->defaultDateFormat)],
            'default_currency'      => ['required'],
            'default_warehouse'     => ['required'],
            'current_app_session'   => ['required'],
            'default_app_session'   => ['required'],
        ], [
            'time_zone.in'          => 'Invalid timezone.',
            'date_format.in'        => 'Invalid timezone.',
        ]);
        

        $updatedSettings = [
            'company_name'          => $request->company_name ?? $systemSetting->company_name,
            'company_email'         => $request->company_email ?? $systemSetting->company_email,
            'company_phone'         => $request->company_phone ?? $systemSetting->company_phone,
            'company_address'       => $request->company_address ?? $systemSetting->company_address,
            'time_zone'             => $request->time_zone ?? $systemSetting->time_zone,
            'date_format'           => $request->date_format ?? $systemSetting->date_format,
            'default_currency'      => $request->default_currency ?? $systemSetting->default_currency,
            'default_warehouse'     => $request->default_warehouse ?? $systemSetting->default_warehouse,
            'current_app_session'   => $request->current_app_session ?? $systemSetting->current_app_session,
            'default_app_session'   => $request->default_app_session ?? $systemSetting->default_app_session,
        ];


        try {
            $systemSetting->update($updatedSettings);
            return Redirect::back()->with($this->sendWithSuccess('System Setting Update.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }
}
