<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use App\Models\posyandu;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatans = kegiatan::all();

       // Mengirim data ke view
       return view('admin.posyandu.list_kegiatan', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posyandus = Posyandu::all();
        return view('admin.posyandu.kegiatan.create', compact('posyandus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'posyandu_id' => 'required|exists:posyandu,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        // Simpan kegiatan
        $kegiatan = Kegiatan::create($request->all());

        // Redirect ke halaman detail posyandu
        // return redirect()->route('posyandu.show', $kegiatan->posyandu_id)
        //                  ->with('success', 'Kegiatan berhasil ditambahkan.');

        return redirect()->route('admin.posyandu.show', $kegiatan->posyandu_id)->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $posyandu = Posyandu::with(['kegiatan' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->findOrFail($id);    
        return view('admin.posyandu.kegiatan.index', compact('posyandu'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kegiatan $kegiatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kegiatan $kegiatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari artikel berdasarkan ID
        $kegiatan = kegiatan::findOrFail($id);


        // Hapus artikel
        $kegiatan->delete();

        // Redirect ke halaman daftar artikel dengan pesan sukses
        return redirect()->route('admin.posyandu.kegiatan.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
