<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posyandu extends Model
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
        return $this->hasMany(Kegiatan::class);
    }
}

