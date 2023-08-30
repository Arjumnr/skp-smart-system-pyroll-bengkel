<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class ModelJenis extends Model
{
    use HasFactory;
    protected $table = 'tb_jenis';
    protected $fillable = [
        'jenis',
        'nama_servis',
        'harga',

    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y ');
    }
}
