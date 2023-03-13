<?php

namespace App\Http\Controllers;

use App\Models\ProductUnit;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class ProductUnitController extends BaseController
{
    protected $operatorList = ['/', '*'];
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $units = ProductUnit::all();
        return view('units.list', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $units = ProductUnit::all();
        $operatorList = $this->operatorList;
        return view('units.create', compact('units', 'operatorList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'          => ['required', 'unique:product_units,name'],
            'short_name'    => ["required", 'unique:product_units,short_name'],
            'operator'      => ['required', Rule::in($this->operatorList)],
            'description'   => 'nullable',
            'base_unit'     => 'nullable'
        ]);


        $validated = [
            'name'          => $request->name,
            'short_name'    => $request->short_name,
            'operator'      => $request->operator,
            'description'   => $request->description,
            'base_unit'     => $request->base_unit
        ];

        try {
            ProductUnit::create($validated);
            return Redirect::route('units.index')->with($this->sendWithSuccess('Unit Create Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductUnit $productUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductUnit $productUnit): View
    {
        $units = ProductUnit::all();
        $operatorList = $this->operatorList;
        return view('units.edit', compact('productUnit', 'units', 'operatorList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductUnit $productUnit): RedirectResponse
    {
        $request->validate([
            'name'          => ['required', "unique:product_units,name," . $productUnit->id],
            'short_name'    => ["required", "unique:product_units,short_name," . $productUnit->id],
            'operator'      => ['required', Rule::in($this->operatorList)],
            'description'   => 'nullable',
            'base_unit'     => 'nullable'
        ]);

        $validated = [
            'name'          => $request->name ?? $productUnit->name,
            'short_name'    => $request->short_name ?? $productUnit->short_name,
            'operator'      => $request->operator ?? $productUnit->operator,
            'description'   => $request->description ?? $productUnit->description,
            'base_unit'     => $request->base_unit ?? $productUnit->base_unit
        ];

        try {
            $productUnit->update($validated);
            return Redirect::route('units.index')->with($this->sendWithSuccess('Unit Update Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Show the specified resource from storage for Remove.
     */
    public function delete(ProductUnit $productUnit): View
    {
        return view('units.delete', compact('productUnit'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductUnit $productUnit): RedirectResponse
    {
        try {
            $productUnit->delete();
            return Redirect::route('units.index')->with($this->sendWithSuccess('Unit Delete Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }
}
