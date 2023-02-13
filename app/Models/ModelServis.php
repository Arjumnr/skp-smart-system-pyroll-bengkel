<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ModelServis extends Model
{
    use HasFactory;
    protected $table = 'tb_servis';
    protected $fillable = [
        'nomor_antrian',
        'nama_pelanggan',
        'w_mulai',
        'w_selesai',
        'jenis_id',
        'user_id',
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y ');
    }
}
