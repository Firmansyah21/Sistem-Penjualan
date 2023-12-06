<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemesananDetail extends Model
{
    use HasFactory;

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
