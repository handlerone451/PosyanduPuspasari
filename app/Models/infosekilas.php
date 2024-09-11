<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infosekilas extends Model
{
    use HasFactory;

    protected $table = 'info_sekilas';

    protected $fillable = [
        'total_posyandu',
        'total_kader',
        'pasien',
        'pasien_balita',
        'videolink'
    ];
}

