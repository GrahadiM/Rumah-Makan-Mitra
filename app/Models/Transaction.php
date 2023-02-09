<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $table = "transactions";
    protected $guarded = [];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->translatedFormat('l, d/m/Y H:i');
    }

    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->translatedFormat('l, d/m/Y H:i');
    }

    public function getTglPesananAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->translatedFormat('l, d/m/Y H:i');
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function order_product()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
