<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'code',
        'name',
        'barcode',
        'barcode_type_id',
        'description',
        'cost',
        'price',
        'net_tex',
        'tex_type_id',
        'discount',
        'stock_alert',
        'product_unit_id',
        'purchase_unit_id',
        'sell_unit_id',
        'category_id',
        'session_id'
    ];

    // :: Get product Unit Detail ::
    public function productUnit(){
        return $this->belongsTo(ProductUnit::class);
    }

     // :: Get product purchase Unit Detail ::
    public function purchaseUnit(){
        return $this->belongsTo(ProductUnit::class);
    }

     // :: Get product sell Unit Detail ::
    public function sellUnit(){
        return $this->belongsTo(ProductUnit::class);
    }

     // :: Get product category Detail ::
    public function category(){
        return $this->belongsTo(Category::class);
    }

     // :: Get product tex type Detail ::
    public function TexType(){
        return $this->belongsTo(TexType::class);
    }

     // :: Get product barcode type Detail ::
    public function BarcodeType(){
        return $this->belongsTo(BarcodeType::class);
    }
}
