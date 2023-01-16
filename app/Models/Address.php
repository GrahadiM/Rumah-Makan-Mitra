<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "address";
    protected $guarded = [];

    public function getProvinsiAttribute($provinsi)
    {
        return strtoupper($provinsi);
    }

    public function getKabupatenAttribute($kabupaten)
    {
        return strtoupper($kabupaten);
    }

    public function getKecamatanAttribute($kecamatan)
    {
        return strtoupper($kecamatan);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
