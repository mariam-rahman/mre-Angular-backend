<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $guarded = [];
    public function category(){

        return $this->belongsTo(Category::class);
    }

    protected function purchases(){
        return $this->hasMany(Purchase::class);
    }

    public function substocks(){
        return $this->hasMany(Substock::class);
    }

    protected function onsales(){
        return $this->hasMany(Onsale::class);
    }

    
}
