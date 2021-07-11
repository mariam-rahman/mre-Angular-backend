<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
  
    use HasFactory;

    protected $guarded = [];

    protected function product(){
        return $this->belongsTo(Product::class);
    }

    public function stock(){
        return $this->belongsTo(Stock::class);
    }
 

    
}
