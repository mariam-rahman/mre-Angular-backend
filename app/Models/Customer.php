<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function sales(){
       return $this->hasMany(Sale::class);
    }
    
    public function getStock(){
        if($this->stock_id == 1) return "Main stock";
        elseif ($this->stock_id == 2) return "Sub stock";
        else return "On sale";
    }
}
