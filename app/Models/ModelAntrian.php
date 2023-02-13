<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;


class ModelAntrian extends Model
{
    use HasFactory;
    public $table = 'tb_antrian';
    protected $fillable = [
        'nama',
        'nomor',
        'status',

    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y ');
    }
}
