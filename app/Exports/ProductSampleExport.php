<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductSampleExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $showProduct = [];

        $record = new Product();
        $record->code           = "CODE";
        $record->name           = "NAME";
        $record->barcode        = "BARCODE";
        $record->barcode_type   = "BARCODE_TYPE";
        $record->description    = "DESCRIPTION";
        $record->cost           = "COST";
        $record->price          = "PRICE";
        $record->order_tex      = "ORDER_TEX";
        $record->tex_type       = "TEX_TYPE";
        $record->discount       = "DISCOUNT";
        $record->stock_alert    = "STACK_ALERT";
        $record->product_unit   = "PRODUCT_UNIT";
        $record->purchase_unit  = "PURCHASE_UNIT";
        $record->sell_unit      = "SELL_UNIT";
        $record->category       = "CATEGORY";
        $record->session        = "SESSION";
        array_push($showProduct, $record); 
        
        $record = new Product();
        $record->code           = "ENGLISH-2023-LKG";
        $record->name           = "ENGLISH BOOK";
        $record->barcode        = "12345678910";
        $record->barcode_type   = "1";
        $record->description    = "test description";
        $record->cost           = "250";
        $record->price          = "320";
        $record->order_tex      = "0";
        $record->tex_type       = "1";
        $record->discount       = "0";
        $record->stock_alert    = "5";
        $record->product_unit   = "1";
        $record->purchase_unit  = "1";
        $record->sell_unit      = "1";
        $record->category       = "1";
        $record->session        = "4";
        array_push($showProduct, $record);

        return collect($showProduct);
    }
}
