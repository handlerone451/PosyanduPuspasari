<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class posyandu extends Model
{
    use HasFactory;

    protected $table = 'posyandu';

    protected $fillable = [
        'nama',
        'alamat',
        'gambar',
        'rw',
    ];

    /**
     * Get the kegiatan for the posyandu.
     */
    public function kegiatan()
    {
        return $this->hasMany(kegiatan::class);
    }
}

