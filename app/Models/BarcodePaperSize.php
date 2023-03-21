<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarcodePaperSize extends Model
{
    use HasFactory;
    protected $fillable=['label','paper','qnt','height','width'];
}
