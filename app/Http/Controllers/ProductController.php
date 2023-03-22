<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExport;
use App\Exports\ProductSampleExport;
use App\Imports\ProductImport;
use App\Models\BarcodePaperSize;
use App\Models\BarcodeType;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductUnit;
use App\Models\SystemSetting;
use App\Models\TexType;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $this->checkAuthorizetion('product.show');
        $products = $this->getAllRecord(new Product());

        $showProduct = [];
        foreach ($products as $product) {
            $record = new Product();
            $record->id             = $product->id;
            $record->code           = $product->code;
            $record->name           = $product->name;
            $record->cost           = $product->cost;
            $record->price          = $product->price;
            $record->order_tex      = $product->order_tex;
            $record->tex_type       = $product->TexType->name;
            $record->discount       = $product->discount;
            $record->stock_alert    = $product->stock_alert;
            $record->product_unit   = $product->productUnit->name;
            $record->purchase_unit  = $product->purchaseUnit->name;
            $record->sell_unit      = $product->sellUnit->name;
            $record->category       = $product->category->name;
            $record->description    = $product->description;

            array_push($showProduct, $record);
        }
        // dd($showProduct);
        return view('product.list', compact('showProduct'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $this->checkAuthorizetion('product.create');
        $categories = Category::all();
        $ProductUnits = ProductUnit::all();
        $texTypes = TexType::all();
        $barcodeTypes = BarcodeType::all();
        return view('product.create', compact('categories', 'ProductUnits', 'texTypes', 'barcodeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->checkAuthorizetion('product.create');
        // Validate Data
        $validated = $request->validate([

            'code'              => ['required', 'unique:products,code'],
            'barcode'           => ['required', 'unique:products,barcode'],
            'barcode_type'      => ['required'],
            'name'              => ['required'],
            'description'       => ['required'],
            'cost'              => ['required'],
            'price'             => ['required'],
            'order_tex'         => ['required'],
            'tex_type'          => ['required'],
            'discount'          => ['required'],
            'stock_alert'       => ['required'],
            'product_unit'      => ['required'],
            'purchase_unit'     => ['required'],
            'sell_unit'         => ['required'],
            'category'          => ['required']
        ], [
            'name.required' => 'The product name field is required',
            'code.required' => 'The product code field is required',
        ]);

        // Prepair Data
        $productData = [
            'code'              =>  $validated['code'],
            'name'              =>  $validated['name'],
            'barcode'           =>  $validated['barcode'],
            'barcode_type_id'   =>  $validated['barcode_type'],
            'description'       =>  $validated['description'],
            'cost'              =>  $validated['cost'],
            'price'             =>  $validated['price'],
            'order_tex'         =>  $validated['order_tex'] ? $validated['order_tex'] : 0,
            'tex_type_id'       =>  $validated['tex_type'],
            'discount'          =>  $validated['discount'] ? $validated['discount'] : 0,
            'stock_alert'       =>  $validated['stock_alert'] ? $validated['stock_alert'] : 0,
            'product_unit_id'   =>  $validated['product_unit'],
            'purchase_unit_id'  =>  $validated['purchase_unit'],
            'sell_unit_id'      =>  $validated['sell_unit'],
            'category_id'       =>  $validated['category'],
            'session_id'        =>  $this->getAppSessionId() ?? SystemSetting::first()->current_app_session
        ];

        try {
            Product::create($productData);
            return Redirect::route('product.index')->with($this->sendWithSuccess('Product Create Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $this->checkAuthorizetion('product.edit');
        $categories = Category::all();
        $ProductUnits = ProductUnit::all();
        $texTypes = TexType::all();
        $barcodeTypes = BarcodeType::all();
        return view('product.edit', compact('product', 'categories', 'ProductUnits', 'texTypes', 'barcodeTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $this->checkAuthorizetion('product.edit');
        // Validate Data
        $validated = $request->validate([

            'code'              => ['required', 'unique:products,code,' . $product->id],
            'barcode'           => ['required', 'unique:products,barcode,' . $product->id],
            'barcode_type'      => ['required'],
            'name'              => ['required'],
            'description'       => ['required'],
            'cost'              => ['required'],
            'price'             => ['required'],
            'order_tex'         => ['required'],
            'tex_type'          => ['required'],
            'discount'          => ['required'],
            'stock_alert'       => ['required'],
            'product_unit'      => ['required'],
            'purchase_unit'     => ['required'],
            'sell_unit'         => ['required'],
            'category'          => ['required']
        ], [
            'name.required'     => 'The product name field is required',
            'code.required'     => 'The product code field is required',
        ]);

        // Prepair Data
        $productUpdatedData = [
            'code'              =>  $validated['code'] ?? $product->code,
            'name'              =>  $validated['name'] ?? $product->name,
            'barcode'           =>  $validated['barcode'] ?? $product->barcode,
            'barcode_type_id'   =>  $validated['barcode_type'] ?? $product->barcode_type_id,
            'description'       =>  $validated['description'] ?? $product->description,
            'cost'              =>  $validated['cost'] ?? $product->cost,
            'price'             =>  $validated['price'] ?? $product->price,
            'order_tex'         =>  $validated['order_tex'] ?? $product->order_tex,
            'tex_type_id'       =>  $validated['tex_type'] ?? $product->tex_type_id,
            'discount'          =>  $validated['discount'] ?? $product->discount,
            'stock_alert'       =>  $validated['stock_alert'] ?? $product->stock_alert,
            'product_unit_id'   =>  $validated['product_unit'] ?? $product->product_unit_id,
            'purchase_unit_id'  =>  $validated['purchase_unit'] ?? $product->purchase_unit_id,
            'sell_unit_id'      =>  $validated['sell_unit'] ?? $product->sell_unit_id,
            'category_id'       =>  $validated['category'] ?? $product->category_id
        ];

        try {
            $product->update($productUpdatedData);
            return Redirect::route('product.index')->with($this->sendWithSuccess('Product Update Success'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product): View
    {
        $this->checkAuthorizetion('product.delete');
        return view('product.delete', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $this->checkAuthorizetion('product.delete');
        try {
            $product->delete();
            return Redirect::back()->with($this->sendWithSuccess('Product Delete Success.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }


    /**
     * Search the specified resource from storage.
     */
    public function search(Request $request): View
    {
        $this->checkAuthorizetion('product.search');

        $query = $request->get('query');

        $products = Product::select(['name'])
            ->where('name', 'like', '%' . $query . '%')
            ->orWhere('code', 'like', '%' . $query . '%')
            ->orWhere('barcode', 'like', '%' . $query . '%')
            ->get();
        

        return view('product.autocomplete',compact('products'));
    }


    /***
     * Export Product in excle
     */
    public function downloadSample()
    {
        return Excel::download(new ProductSampleExport, 'product_list_sample.xlsx');
    }

    /***
     * Export Product in excle
     */
    public function exportExcle()
    {
        return Excel::download(new ProductsExport, 'product_list.xlsx');
    }

    /***
     * Import Product in excle
     */
    public function productImport(): View
    {
        $this->checkAuthorizetion('product.import');
        return view('product.import');
    }

    /***
     * Import Product in excle
     */
    public function importExcle(Request $request): RedirectResponse
    {
        $this->checkAuthorizetion('product.import');
        $request->validate(['file' => 'required|max:50000|mimes:xlsx,xls']);

        try {
            Excel::import(new ProductImport, $request->file);
            return Redirect::back()->with($this->sendWithSuccess('Product Imported Successfully.'));
        } catch (\Exception $e) {
            return Redirect::back()->with($this->sendWithError($e->getMessage()));
        }
    }


    /***
     * Generate Product barcode
     */
    public function barcodeGenerate(Request $request, Product $product)
    {
        $this->checkAuthorizetion('product.barcode.generate');
        return view('product.barcode',compact('product'));
    }
}
