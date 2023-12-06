<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'kategori_id',
        'name',
        'harga',
        'stok',
        'gambar',
        'ket',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function pemesanan_detail()
    {
        return $this->belongsTo(PemesananDetail::class);
    }
    public function keranjang()
    {
        return $this->hasMany(keranjang::class);
    }
}
