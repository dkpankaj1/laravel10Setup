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
        $this->checkAuthorizetion('currency.show');

        $curencys = Currency::all();
        return view('currency.list', compact('curencys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->checkAuthorizetion('currency.create');

        return view('currency.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->checkAuthorizetion('currency.create');


        $validated = $request->validate([
            'name'          => ["required", "unique:currencies,name"],
            'code'          => ["required", "unique:currencies,code"],
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
    public function edit(Currency $currency): View
    {
        $this->checkAuthorizetion('currency.edit');

        return view('currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency): RedirectResponse
    {
        $this->checkAuthorizetion('currency.edit');

        $validated = $request->validate([
            'name'          => ["required", "unique:currencies,name," . $currency->id],
            'code'          => ["required", "unique:currencies,code," . $currency->id],
            'symbol'        => 'required',
            'description'   => 'nullable',
        ]);

        $newCurrencyData = [
            'name' => $validated['name'] ?? $currency->name,
            'code' => $validated['code'] ?? $currency->code,
            'symbol' => $validated['symbol'] ?? $currency->symbol,
            'description' => $request->description ?? $currency->description,
        ];

        try {
            $currency->update($newCurrencyData);
            return Redirect::route('currency.index')->with($this->sendWithSuccess('Currency Update Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Currency $currency): View
    {
        $this->checkAuthorizetion('currency.delete');

        return view('currency.delete', compact('currency'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency): RedirectResponse
    {
        $this->checkAuthorizetion('currency.delete');

        try {
            $currency->delete();
            return Redirect::back()->with($this->sendWithSuccess('Currency Delete Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }
}
