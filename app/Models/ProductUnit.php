<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductUnit extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['name','short_name','operator','description','base_unit'];

    public function baseUnit(){
        return $this->belongsTo(ProductUnit::class,'base_unit','id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
}
