<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function keranjang()
    {
        return $this->hasMany(keranjang::class);
    }

    public function ongkir()
    {
        return $this->belongsTo(Ongkir::class);
    }
    public function pemesanan_detail()
    {
        return $this->hasMany(PemesananDetail::class);
    }
}
