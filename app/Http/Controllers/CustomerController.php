<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\SystemSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CustomerController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index():View
    {
        $customers = Customer::where('session_id',$this->getAppSessionId())->get();
        return view('customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        $validated = $request->validate([
            'name'      => ["required"],
            'phone'     => ["required"],
            'email'     => 'nullable',
            'address'   => 'nullable',
            'remark'    => 'nullable',
        ]);

        $newCustomer = [
            'name'          => $validated['name'],
            'phone'         => $validated['phone'],
            'email'         => $validated['email'],
            'address'       => $validated['address'],
            'remark'        => $validated['address'],
            'session_id'    => SystemSetting::first()->current_app_session,
        ];

        try {
            Customer::create($newCustomer);
            return Redirect::route('customer.index')->with($this->sendWithSuccess('Customer Create Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer):View
    {
        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer):RedirectResponse
    {
        $validated = $request->validate([
            'name'      => ["required"],
            'phone'     => ["required"],
            'email'     => 'nullable',
            'address'   => 'nullable',
            'remark'   => 'nullable',
        ]);

        $updateCustomer = [
            'name'      => $validated['name'] ?? $customer->name,
            'phone'     => $validated['phone'] ?? $customer->phone,
            'email'     => $validated['email'] ?? $customer->email,
            'address'   => $validated['address'] ?? $customer->address,
            'remark'   => $validated['remark'] ?? $customer->remark,
        ];

        try {
            $customer->update($updateCustomer);
            return Redirect::route('customer.index')->with($this->sendWithSuccess('Customer Update Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Customer $customer): View
    {
        return view('customer.delete', compact('customer'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer):RedirectResponse
    {
        try {
            $customer->delete();
            return Redirect::back()->with($this->sendWithSuccess('Customer Delete Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }
}
