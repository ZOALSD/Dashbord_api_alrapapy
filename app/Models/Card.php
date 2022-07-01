<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'total',
        'number_notification',
        'image_notification',
        'status'
    ];

    public function order()
    {
       return $this->hasMany(\App\Models\Order::class);
    }
    
}
