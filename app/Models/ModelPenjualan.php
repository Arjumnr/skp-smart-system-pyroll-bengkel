<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ModelPenjualan extends Model
{
    use HasFactory;
    protected $table = 'tb_penjualan';
    protected $fillable = [
        'nama_pelanggan',
        'barang_id',
        'deskripsi',
        'user_id'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y ');
    }
}
