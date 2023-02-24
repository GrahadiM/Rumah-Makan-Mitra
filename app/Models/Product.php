<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
