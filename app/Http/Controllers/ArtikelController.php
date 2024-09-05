<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\InfoSekilas;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Purifier;
use Illuminate\Support\Facades\Storage;


class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->paginate(6);
        return view('admin.artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.artikel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:100|min:10|unique:artikel,slug',
            'isi' => 'required|string|min:10',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], 
        [
            'judul.unique' => 'Judul artikel sudah ada, silakan gunakan judul yang berbeda.',
            'judul.max' => 'Judul artikel tidak boleh lebih dari 100 karakter.',
            'judul.min' => 'Judul artikel tidak boleh kurang dari 30 karakter.',
            'isi.min' => 'Isi artikel minimal 1500 karakter.',
            'gambar.max' => 'Gambar tidak boleh lebih dari 2MB.',
        ]);


        // Membuat slug dari judul
        $slug = Str::slug($request->judul);
         // Memeriksa apakah slug sudah ada
        if (Artikel::where('slug', $slug)->exists()) {
            return redirect()->back()->withErrors(['judul' => 'Judul artikel sudah ada, silakan gunakan judul yang berbeda.']);
        }


        $data = $request->all();
        $data['judul'] = ucwords(strtolower(strip_tags($request->judul)));
        $data['isi'] = strip_tags($request->input('isi'));

        if ($request->hasFile('gambar')) {
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('artikel_images', $fileName, 'public');
            $data['gambar'] = $fileName;
        }

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    /**
     * Display the specified resource.
     */
    public function show(artikel $artikel)
    {
        $artikels = Artikel::latest()->take(6)->get();
        $info_sekilas = InfoSekilas::first(); // atau InfoSekilas::find(1);
        $posyandus = Posyandu::all();
        $title = "Home";
        return view('user.home', compact('artikels', 'info_sekilas', 'posyandus', 'title'));
    }


    public function frontShow(Request $request)
    {
        // Ambil nilai query pencarian dari input
        $title = "Artikel";
        $search = $request->input('search');

        // Jika ada pencarian, filter artikel berdasarkan judul
        if ($search) {
            $artikels = Artikel::where('judul', 'like', "%{$search}%")
                ->orderBy('created_at', 'desc')
                ->paginate(6);
        } else {
            // Jika tidak ada pencarian, tampilkan semua artikel dengan pagination
            $artikels = Artikel::orderBy('created_at', 'desc')->paginate(6);
        }

        return view('user.artikel.index', compact('artikels', 'search', 'title'));
    }

    public function showartikel($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        $title = "Artikel";
        return view('user.artikel.show', compact('artikel', 'title'));
    }
    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:100|min:10|unique:artikel,slug',
            'isi' => 'required|string|min:10',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], 
        [
            'judul.unique' => 'Judul artikel sudah ada, silakan gunakan judul yang berbeda.',
            'judul.max' => 'Judul artikel tidak boleh lebih dari 100 karakter.',
            'judul.min' => 'Judul artikel tidak boleh kurang dari 30 karakter.',
            'isi.min' => 'Isi artikel minimal 1500 karakter.',
            'gambar.max' => 'Gambar tidak boleh lebih dari 2MB.',
        ]);

        $artikel = Artikel::findOrFail($id);

        $data = $request->all();

        // Menghapus gambar lama jika ada gambar baru
        if ($request->hasFile('gambar')) {
            if ($artikel->gambar) {
                Storage::disk('public')->delete('artikel_images/' . $artikel->gambar);
            }
            $fileName = time() . '.' . $request->gambar->extension();
            $request->gambar->storeAs('artikel_images', $fileName, 'public');
            $data['gambar'] = $fileName;
        }

        // Update artikel
        $artikel->update($data);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Jika ada gambar, hapus gambar dari storage
        if ($artikel->gambar) {
            Storage::disk('public')->delete('artikel_images/' . $artikel->gambar);
        }

        // Hapus artikel
        $artikel->delete();

        // Redirect ke halaman daftar artikel dengan pesan sukses
        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

}
