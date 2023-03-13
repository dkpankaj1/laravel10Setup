<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $categorys = Category::all();
        return view('category.list', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'          => ['required', 'unique:warehouses,name'],
            'description'   => ['nullable'],
        ]);

        $validated = [
            'name'          => $request->name,
            'description'   => $request->description,
        ];
        try {
            Category::create($validated);
            return Redirect::route('category.index')->with($this->sendWithSuccess('Category Create Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category):View
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category):RedirectResponse
    {
        $request->validate([
            'name'          => ['required', 'unique:warehouses,name,' . $category->id],
            'description'   => ['nullable']
        ]);

        $validated = [
            'name'          => $request->name ?? $category->name,
            'description'   => $request->description ?? $category->description
        ];
        try {
            $category->update($validated);
            return Redirect::route('category.index')->with($this->sendWithSuccess('Category Update Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Category $category): View
    {
        return view('category.delete', compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category):RedirectResponse
    {
        try {
            $category->delete();
            return Redirect::back()->with($this->sendWithSuccess('Category Delete Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }
}
