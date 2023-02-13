<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAntrian extends Model
{
    use HasFactory;
    public $table = 'tb_antrian';
    protected $fillable = [
        'nama',
        'nomor',
        'status',

    ];
}
