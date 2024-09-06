<?php

use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InfoSekilasController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ArtikelController::class, 'show'])->name('/home');
Route::get('/artikel', [ArtikelController::class, 'frontshow'])->name('/artikel');
Route::get('/artikel/{slug}', [ArtikelController::class, 'showartikel'])->name('artikel.show_by_slug');
Route::get('/artikels', [ArtikelController::class, 'frontshow'])->name('artikel.frontshow');
Route::get('/DaftarPosyandu', [PosyanduController::class, 'ListPosyandu'])->name('/DaftarPosyandu');
Route::get('/DaftarPosyandu/{nama}', [PosyanduController::class, 'showByNama'])->name('posyandu.show_by_nama');


Route::get('/dashboard', [InfoSekilasController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function(){
        //resourece
        Route::resource('kegiatan', KegiatanController::class)->middleware('role:admin');
        Route::resource('posyandu', PosyanduController::class)->middleware('role:admin');
        Route::resource('artikel', ArtikelController::class)->middleware('role:admin');
        Route::resource('info_sekilas', InfoSekilasController::class)->middleware('role:admin');
        
        // // update artikel
        // Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
        // Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
        Route::get('/posyandu/{posyandu}/kegiatan', [PosyanduController::class, 'index'])
        ->name('admin.posyandu.kegiatan.index');
        // Tambahkan route khusus di bawah resource route
        Route::get('/info_sekilas/{info_sekilas}/edit-link-video', [InfoSekilasController::class, 'editLinkVideo'])
        ->name('info_sekilas.edit_link_video');
        Route::put('/info_sekilas/{info_sekilas}/edit-link-video', [InfoSekilasController::class, 'youtube_link'])
        ->name('info_sekilas.youtube_link');
        // Route untuk meng-update kegiatan
        Route::get('posyandu/kegiatan/{id}/edit', [KegiatanController::class, 'edit'])->name('edit.kegiatan');
        Route::put('/kegiatan/{id}', [KegiatanController::class, 'update'])->name('update.kegiatan');
    });
});

require __DIR__.'/auth.php';
