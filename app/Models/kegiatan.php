<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'posyandu_id',
        'judul',
        'deskripsi',
        'tanggal',
    ];

    /**
     * Get the posyandu that owns the kegiatan.
     */
    public function posyandu()
    {
        return $this->belongsTo(Posyandu::class);
    }
}

