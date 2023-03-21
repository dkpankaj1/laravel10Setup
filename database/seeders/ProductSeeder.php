<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'code'              =>  'GKP-2023-LKG-ENG',
            'name'              =>  'English Fun',
            'barcode'           =>  '1122334455',
            'barcode_type_id'   =>  1,
            'description'       =>  'ENGLISH BOOK FOT LKG',
            'cost'              =>  200,
            'price'             =>  253,
            'order_tex'         =>  0,
            'tex_type_id'       =>  1,
            'discount'          =>  0,
            'stock_alert'       =>  5,
            'product_unit_id'   => 1,
            'purchase_unit_id'  =>  1,
            'sell_unit_id'      =>  1,
            'category_id'       =>  1,
            'session_id'        =>  4
        ]);
        Product::create([
            'code'              =>  'GKP-2023-LKG-HI',
            'name'              =>  'Hindi Book',
            'barcode'           =>  '1122334456',
            'barcode_type_id'   =>  1,
            'description'       =>  'HINDI BOOK FOT LKG',
            'cost'              =>  150,
            'price'             =>  350,
            'order_tex'         =>  0,
            'tex_type_id'       =>  1,
            'discount'          =>  0,
            'stock_alert'       =>  5,
            'product_unit_id'   => 1,
            'purchase_unit_id'  =>  1,
            'sell_unit_id'      =>  1,
            'category_id'       =>  1,
            'session_id'        =>  4
        ]);
    }
}
