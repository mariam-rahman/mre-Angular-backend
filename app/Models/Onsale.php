<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onsale extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }

    public function getRevenue()
    {
        $actual_price = $this->purchase->purchase_id;
        $qty = $this->qty;
        $percentage = (($actual_price * 10) / 100) * $qty;
           return $percentage;
    }
}
