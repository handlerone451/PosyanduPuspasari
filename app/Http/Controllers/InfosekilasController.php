<?php

namespace App\Http\Controllers;

use App\Models\infosekilas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InfosekilasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $info_sekilas = InfoSekilas::first(); // atau InfoSekilas::find(1);
        return view('admin.dashboard', compact('info_sekilas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(infosekilas $infosekilas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $info_sekilas = infosekilas::findOrFail($id);
        return view('admin.info_sekilas.edit', compact('info_sekilas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InfoSekilas $info_sekila)
    {
        $request->validate([
            'total_posyandu' => 'required|integer',
            'total_kader' => 'required|integer',
            'pasien' => 'required|integer',
            'pasien_balita' => 'required|integer',
        ]);

        $info_sekila->update($request->all());

        return redirect()->route('admin.info_sekilas.index')->with('success', 'Info Sekilas berhasil diperbarui.');
    }

    public function editLinkVideo($id)
    {
        $info_sekilas = infosekilas::findOrFail($id);
        return view('admin.info_sekilas.videoedit', compact('info_sekilas'));
    }

    public function youtube_link(Request $request, $id)
    {
        // Validasi URL YouTube embed dengan query string opsional

        $request->validate([
            'youtube_link' => [
                'required',
                'regex:/^https:\/\/www\.youtube\.com\/embed\/[a-zA-Z0-9_-]+(\?.*)?$/',
                function ($attribute, $value, $fail) {
                    // Ambil ID video dari URL
                    preg_match('/^https:\/\/www\.youtube\.com\/embed\/([a-zA-Z0-9_-]+)(\?.*)?$/', $value, $matches);
                    $videoId = $matches[1] ?? null;
    
                    if ($videoId) {
                        // Ganti dengan API Key Anda
                        $apiKey = 'AIzaSyAKi2dXXyGILFyj_zKkb2GazRIYslyIyjU';
    
                        // Kirim permintaan untuk memeriksa video
                        $response = Http::get("https://www.googleapis.com/youtube/v3/videos", [
                            'part' => 'snippet',
                            'id' => $videoId,
                            'key' => $apiKey,
                        ]);
    
                        if ($response->successful()) {
                            $video = $response->json();
                            if (empty($video['items'])) {
                                $fail('Link YouTube tidak valid atau video tidak ditemukan.');
                            }
                        } else {
                            $fail('Gagal memverifikasi video YouTube.');
                        }
                    } else {
                        $fail('Link YouTube tidak valid.');
                    }
                },
            ],
        ], [
            'youtube_link.regex' => 'Link yang dimasukkan harus berupa embed link dari YouTube.',
        ]);
    
        // Ambil data yang akan diperbarui
        $data = infosekilas::findOrFail($id);
    
        // Update data dengan link embed
        $data->videolink = $request->input('youtube_link');
        $data->save();
    
        return redirect()->route('admin.info_sekilas.index')->with('success', 'Link YouTube berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(infosekilas $infosekilas)
    {
        //
    }
}
