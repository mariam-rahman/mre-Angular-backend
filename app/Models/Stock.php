<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function purchases(){
        return $this->hasMany(Purchase::class);
    }

    protected function onsales(){
        return $this->hasMany(Onsale::class);
    }
}
