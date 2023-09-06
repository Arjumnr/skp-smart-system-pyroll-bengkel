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

    //getPenjualan
    public function getPenjualan(){
        return $this->belongsTo(ModelPenjualan::class, 'penjualan_id', 'id');
    }

    //getServis
    public function getServis(){
        return $this->belongsTo(ModelServis::class, 'servis_id', 'id');
    }

    //getUser
    public function getUser(){
        return $this->belongsTo(ModelUser::class, 'user_id', 'id');
    }

    

   
}
