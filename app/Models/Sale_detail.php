<?php

namespace App\Models;

use session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale_detail extends Model
{
   
    use HasFactory;

    public function product(){
        return $this->belongsTo(Product::class);
    }

   
}
