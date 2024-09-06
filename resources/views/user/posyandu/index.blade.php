@extends('layouts.layout')

@section('title', 'Home Page')

@section('content')





<!-- end offer section -->

<!-- food section -->

<section class="food_section layout_padding-bottom">
  <div class="container">
    <div class="heading_daftar_kegiatan heading_center text-center">
      <h2 class="">
        Daftar Kegiatan <br>{{$posyandu->nama}}
      </h2>
        @if($kegiatans->isEmpty())
            <p>Belum ada kegiatan yang terdaftar untuk posyandu ini.</p>
        @else
    </div>
    
    <section class="container my-5">
      @foreach($kegiatans as $kegiatan)
        <div class="row justify-content-center about-us">
            <div class="col-md-6">
                <!-- Card dengan Video YouTube dan Konten -->
                <div class="card kegiatan-card shadow-box">
                  <!-- Card Body -->
                  <div class="card-body isi-kegiatan">
                      <h5 class="card-title">{{ $kegiatan->judul }}</h5>
                        <p class="tanggal-kegiatan">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0"/>
                            </svg> {{ \Carbon\Carbon::parse($kegiatan->tanggal)->format('d M Y') }}
                        </p>
                      <p class="card-text">{{$kegiatan->deskripsi}}</p>
                  </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>

    @endif
  </div>
</section>
<!-- Pagination Links -->
<div class="d-flex justify-content-center mt-4">
  {{ $kegiatans->links('pagination::bootstrap-5') }}
</div>

<!-- end food section -->


@endsection
