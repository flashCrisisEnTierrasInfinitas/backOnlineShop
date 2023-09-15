<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombrePro','codigoPro','descripPro','precioPro','stockPro'];
}

//! MODELO DE LOS PRODUCTOS