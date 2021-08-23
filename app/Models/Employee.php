<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function slips(){
        return $this->hasMany(Slip::class);
    }

    public function expenses(){
        return $this->hasMany(Expense::class);
    }

}
