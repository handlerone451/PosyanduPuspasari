<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel';

    protected $fillable = [
        'judul',
        'isi',
        'tanggal_terbit',
        'gambar',
        'slug',
    ];

    /**
     * Create a slug for the article before saving it.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function ($artikel) {
            if (empty($artikel->slug)) {
                $artikel->slug = Str::slug($artikel->judul, '-');
            }
        });
    }
}
