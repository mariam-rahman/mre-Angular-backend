<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id','sell_date','stock_id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function sell_details(){
     return $this->hasMany(Sale_detail::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    
    public function getStock(){
        if($this->stock_id == 1) return "Main stock";
        elseif ($this->stock_id == 2) return "Sub stock";
        else return "On sale";
    }

    public function getProducts(){
        return Product::all();
    }
   
    public function getTotal(){
        return $this->sell_details->sum('sell_price');
    }
}
