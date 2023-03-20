<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TexType extends Model
{
    use HasFactory;
    protected $fillable=['name','type','description'];

    public function products(){
        return $this->hasMany(Product::class);
    }

}
