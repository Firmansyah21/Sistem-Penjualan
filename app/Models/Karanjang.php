<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karanjang extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'produk_id', 'jumlah', 'total', 'harga', 'pemesanan_id', 'tgl_pesan'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class);
    }
}
