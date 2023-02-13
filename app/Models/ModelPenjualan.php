<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPenjualan extends Model
{
    use HasFactory;
    protected $table = 'tb_penjualan';
    protected $fillable = [
        'nama_pelanggan',
        'nama_barang',
        'user_id'
    ];
}
