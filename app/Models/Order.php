<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'card_id',
        'product_id',
        'quantity',
        'price',
        'summation'
    ];

    public function product(){
        return $this->hasMany(\App\Models\product::class,'id','product_id');
    }
    
}
