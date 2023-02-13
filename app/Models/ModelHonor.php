<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHonor extends Model
{
    use HasFactory;
    protected $table = 'tb_honor';
    protected $fillable = [
        'user_id',
        'servis_id',
        'penjualan_id',

    ];
}
