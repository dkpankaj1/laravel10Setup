<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CurrencyController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $curencys = Currency::all();
        return view('currency.list', compact('curencys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('currency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $validated = $request->validate([
            'name'          => 'required',
            'code'          => 'required',
            'symbol'        => 'required',
            'description'   => 'nullable',
        ]);

        $newCurrencyData = [
            'name' => $validated['name'],
            'code' => $validated['code'],
            'symbol' => $validated['symbol'],
            'description' => $request->description,
        ];

        try {
            Currency::create($newCurrencyData);
            return Redirect::route('currency.index')->with($this->sendWithSuccess('Currency Create Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Currency $currency)
    {
        return view('currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Currency $currency): View
    {
        return view('currency.delete', compact('currency'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        try {
            $currency->delete();
            return Redirect::back()->with($this->sendWithSuccess('Currency Delete Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }
}
