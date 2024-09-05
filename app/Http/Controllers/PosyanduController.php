<?php

namespace App\Http\Controllers;

use App\Models\posyandu;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua data posyandu dari database
        $posyandus = Posyandu::all();

        // Mengirim data ke view
        return view('admin.posyandu.index', compact('posyandus'));
    }

    public function ListPosyandu()
    {
        // Mengambil semua data posyandu dari database
        $posyandus = Posyandu::all();
        $title = "Daftar Posyandu";
        // Mengirim data ke view
        return view('user.daftarPosyandu', compact('posyandus', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $posyandu = Posyandu::with(['kegiatan' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);

        // Mengambil kegiatan dengan pagination
        $kegiatanPaginated = $posyandu->kegiatan()->paginate(10); // Ganti 10 dengan jumlah yang diinginkan per halaman   
        return view('admin.posyandu.kegiatan.index', compact('posyandu', 'kegiatanPaginated'));
    }

    public function showByNama($nama)
    {
        $posyandu = Posyandu::where('nama', $nama)->firstOrFail();
        $kegiatans = $posyandu->kegiatan()->orderBy('created_at', 'desc')->paginate(5);
        $title = "Kegiatan";
        return view('user.posyandu.index', compact('posyandu', 'kegiatans', 'title'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(posyandu $posyandu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, posyandu $posyandu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(posyandu $posyandu)
    {
        //
    }
}
