@extends('layouts.layout')

@section('title', 'Home Page')

@section('content')





<!-- food section -->

<div class="container mt-4">
    <div class="heading_daftar_kegiatan heading_center text-center">
        <h2>Artikel terbaru</h2>
        <!-- Form Pencarian -->
        <form action="{{ route('artikel.frontshow') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Cari artikel..." value="{{ request()->get('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
        </form>
    </div>
    <div class="row">
        @forelse($artikels as $artikel)
            <div class="col-md-4 mb-4">
                <div class="card card-page-artikel shadow-box">
                    @if($artikel->gambar)
                        <a href="{{ route('artikel.show_by_slug', $artikel->slug) }}">
                            <img src="{{ asset('storage/artikel_images/' . $artikel->gambar) }}" class="card-img-top artikel-img" alt="{{ $artikel->judul }}">
                        </a>
                    @else
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $artikel->judul }}">
                    @endif
                    <div class="card-body">
                        <p class="tanggal-kegiatan">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                            </svg> 
                            {{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}
                        </p>
                        <h5 class="card-title">
                            <a href="{{ route('artikel.show_by_slug', $artikel->slug) }}">{{ $artikel->judul }}</a>
                        </h5>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <p class="text-center">Artikel tidak ditemukan.</p>
            </div>
        @endforelse
    </div>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        {{ $artikels->appends(['search' => $search])->links('pagination::bootstrap-5') }}
    </div>
</div>






@endsection
