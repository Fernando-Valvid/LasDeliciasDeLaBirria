<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //use HasFactory;
    public function product(){
        return $this->belongsTo(Producto::class);
    }

    public function getUrlAttribute(){
        if(substr($this->image, 0, 4)==="http"){
            return $this->image;
        }
        return '/images/products/'.$this->image;
    }
}
