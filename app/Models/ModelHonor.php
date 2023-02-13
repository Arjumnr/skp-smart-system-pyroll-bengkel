<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class ModelHonor extends Model
{
    use HasFactory;
    protected $table = 'tb_honor';
    protected $fillable = [
        'user_id',
        'servis_id',
        'penjualan_id',

    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y ');
    }
}
