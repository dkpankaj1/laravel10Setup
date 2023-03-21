<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductImport implements ToModel,WithHeadingRow,WithValidation
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'code'              =>  $row['code'],
            'name'              =>  $row['name'],
            'barcode'           =>  $row['barcode'],
            'barcode_type_id'   =>  $row['barcode_type'],
            'description'       =>  $row['description'],
            'cost'              =>  $row['cost'],
            'price'             =>  $row['price'],
            'order_tex'         =>  $row['order_tex'] ? $row['order_tex'] : 0,
            'tex_type_id'       =>  $row['tex_type'],
            'discount'          =>  $row['discount'] ? $row['discount'] : 0,
            'stock_alert'       =>  $row['stack_alert'] ? $row['stack_alert'] : 0,
            'product_unit_id'   =>  $row['product_unit'],
            'purchase_unit_id'  =>  $row['purchase_unit'],
            'sell_unit_id'      =>  $row['sell_unit'],
            'category_id'       =>  $row['category'],
            'session_id'        =>  $row['session'],
        ]);
    }

    public function rules(): array
    {
        return [
            'code' => 'required|unique:products,code',
            'barcode' => 'required|unique:products,barcode',
        ];
    }
}
