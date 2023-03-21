<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SystemSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SupplierController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAuthorizetion('supplier.show');

        $suppliers = $this->getAllRecord(new Supplier());
        return view('supplier.list', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAuthorizetion('supplier.create');
        return view('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->checkAuthorizetion('supplier.create');

        $validated = $request->validate([
            'name'          => ["required"],
            'phone'         => ["required"],
            'email'         => 'nullable',
            'address'       => 'nullable',
            'remark'        => 'nullable',
        ]);

        $newCurrencyData = [
            'name'          => $validated['name'],
            'phone'         => $validated['phone'],
            'email'         => $validated['email'],
            'address'       => $validated['address'],
            'remark'        => $validated['address'],
            'session_id'    => SystemSetting::first()->current_app_session,
        ];

        try {
            Supplier::create($newCurrencyData);
            return Redirect::route('supplier.index')->with($this->sendWithSuccess('Supplier Create Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        $this->checkAuthorizetion('supplier.edit');

        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->checkAuthorizetion('supplier.edit');

        $validated = $request->validate([
            'name'      => ["required"],
            'phone'     => ["required"],
            'email'     => 'nullable',
            'address'   => 'nullable',
            'remark'   => 'nullable',
        ]);

        $newSupplierData = [
            'name'      => $validated['name'] ?? $supplier->name,
            'phone'     => $validated['phone'] ?? $supplier->phone,
            'email'     => $validated['email'] ?? $supplier->email,
            'address'   => $validated['address'] ?? $supplier->address,
            'remark'   => $validated['remark'] ?? $supplier->remark,
        ];

        try {
            $supplier->update($newSupplierData);
            return Redirect::route('supplier.index')->with($this->sendWithSuccess('Supplier Update Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Supplier $supplier): View
    {
        $this->checkAuthorizetion('supplier.delete');

        return view('supplier.delete', compact('supplier'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $this->checkAuthorizetion('supplier.delete');

        try {
            $supplier->delete();
            return Redirect::back()->with($this->sendWithSuccess('Supplier Delete Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }
}
