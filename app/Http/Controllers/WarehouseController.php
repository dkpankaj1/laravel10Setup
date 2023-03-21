<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WarehouseController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->checkAuthorizetion('warehouse.show');
        $warehouses = Warehouse::all();
        return view('warehouse.list', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->checkAuthorizetion('warehouse.create');
        return view('warehouse.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->checkAuthorizetion('warehouse.create');
        $request->validate([
            'name'          => ['required', 'unique:warehouses,name'],
            'email'         => ['required'],
            'phone'         => ['required'],
            'address'       => ['required'],
            'description'   => ['nullable'],
        ]);

        $validated = [
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'description'   => $request->description,
        ];
        try {
            $warehouses = Warehouse::create($validated);
            return Redirect::route('warehouse.index')->with($this->sendWithSuccess('Warehouse Create Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Warehouse $warehouse): View
    {
        $this->checkAuthorizetion('warehouse.edit');
        return view('warehouse.edit', compact('warehouse'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse): RedirectResponse
    {
        $this->checkAuthorizetion('warehouse.edit');
        $request->validate([
            'name'          => ['required', 'unique:warehouses,name,' . $warehouse->id],
            'email'         => ['required'],
            'phone'         => ['required'],
            'address'       => ['required'],
            'description'   => ['nullable']
        ]);

        $validated = [
            'name'          => $request->name ?? $warehouse->name,
            'email'         => $request->email ?? $warehouse->email,
            'phone'         => $request->phone ?? $warehouse->phone,
            'address'       => $request->address ?? $warehouse->address,
            'description'   => $request->description ?? $warehouse->description
        ];
        try {
            $warehouse->update($validated);
            return Redirect::route('warehouse.index')->with($this->sendWithSuccess('Warehouse Update Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Warehouse $warehouse): View
    {
        $this->checkAuthorizetion('warehouse.delete');
        return view('warehouse.delete', compact('warehouse'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse): RedirectResponse
    {
        $this->checkAuthorizetion('warehouse.delete');
        try {
            $warehouse->delete();
            return Redirect::back()->with($this->sendWithSuccess('Warehouse Delete Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    public function generatePdf()
    {
        $data =  Warehouse::get();
        $pdf = Pdf::loadView('warehouse.pdf',['data' => $data]);
        return $pdf->download('invoice.pdf');
    }
}
