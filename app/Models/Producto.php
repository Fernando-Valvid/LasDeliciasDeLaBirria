<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //use HasFactory;
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function getFeaturedImageUrlAttribute(){
        $featuredImage=$this->images()->where('featured', true)->first();
        if(!$featuredImage)
            $featuredImage=$this->images()->first();

        if($featuredImage){
            return $featuredImage->url;
        }

        //default
        return 'images/products/default.jpg';
    }
}
