<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CartDetail;

class Cart extends Model
{
    use HasFactory;
    public function details(){
        return $this->hasMany(CartDetail::class);
    }
}
