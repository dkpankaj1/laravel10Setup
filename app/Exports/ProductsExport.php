<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $products = Product::all();

        $showProduct = [];

        $record = new Product();
        $record->id             = "_ID";
        $record->code           = "CODE";
        $record->name           = "NAME";
        $record->cost           = "COST";
        $record->price          = "PRICE";
        $record->order_tex      = "ORDER_TEX (%)";
        $record->tex_type       = "TEX_TYPE";
        $record->discount       = "DISCOUNT (%)";
        $record->stock_alert    = "STOCK_ALERT";
        $record->product_unit   = "PRODUCT_UNIT";
        $record->purchase_unit  = "PURCGASE_UNIT";
        $record->sell_unit      = "SELL_UNIT";
        $record->category       = "CATEGORY";
        $record->description    = "DESCRIPTION";
        array_push($showProduct, $record);
        
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

        return collect($showProduct);
    }
}
