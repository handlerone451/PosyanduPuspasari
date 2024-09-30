@extends('layouts.layout')

@section('title', 'Home Page')

@section('content')





<!-- offer section -->
<div class="landing-page">
  <div class="image-container bg-box">
    <img src="images/Anggrek02.jpeg" alt="">
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 col-lg-6 ">
        <div class="welcome-text">
          <h1>SELAMAT DATANG DI PORTAL WEBSITE POSYANDU DESA PUSPASARI</h1>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="container my-5">
      <div class="row justify-content-center about-us">
          <div class="col-md-12">
              <!-- Card dengan Video YouTube dan Konten -->
              <div class="card about-card d-flex flex-md-row">
                <!-- Video Embed -->
                <div class="video-container">
                    <iframe src="{{ $info_sekilas->videolink }}" title="YouTube video player" allowfullscreen></iframe>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <h5 class="card-title">Tentang Kami</h5>
                    <p class="card-text">Sistem Informasi Posyandu SIP adalah tatanan dari berbagai komponen kegiatan Posyandu yang menghasilkan data dan informasi tentang pelayanan terhadap proses tumbuh kembang anak dan pelayanan kesehatan dasar ibu dan anak yang meliputi cakupan program, pencapaian program, kontinuitas penimbangan, hasil penimbangan dan partisipasi masyarakat.</p>
                </div>
              </div>
          </div>
      </div>
  </section>
<section class="offer_section layout_padding-bottom">
  <div class="offer_container">
    <div class="container ">
      <div class="row justify-content-center">
        <div class="col-md-6  ">
          <div class="box">
            <div class="detail-box quick-info row justify-content-center">
                <h4 class="">Posyandu Puspasari</h4>
                <table class="table text-light mt-3 text-center" style="border: 1px solid #ffffff00 !important;">
                    <thead>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Total Posyandu <br>({{ $info_sekilas->total_posyandu }})</td>
                        <td>Total Kader <br>({{ $info_sekilas->total_kader }})</td>
                      </tr>
                      <tr>
                        <td>Pasien Ibu/Bapak <br>({{ $info_sekilas->pasien }})</td>
                        <td> Pasien Bayi/Balita <br>({{ $info_sekilas->pasien_balita }})</td>
                      </tr>
                    </tbody>
                </table>
                <a href="{{ route('/DaftarPosyandu')}}">Lihat semua posyandu</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="offer_section layout_padding-bottom">
  <div class="offer_container">
    <div class="container ">
      <div class="row">
        <div class="col-md-6  ">
          <div class="box ">
            <div class="img-box">
              <img src="images/cardImg.jpg" alt="">
            </div>
            <div class="detail-box">
              <h5 class="mb-2">
                Kegiatan Posyandu
              </h5>
              <a href="{{ route('/DaftarPosyandu') }}">Lihat Kegiatan</a>
            </div>
          </div>
        </div>
        <div class="col-md-6  ">
            <div class="box ">
              <div class="img-box">
                <img src="images/Posyandu.jpg" alt="">
              </div>
              <div class="detail-box">
                <h5 class="mb-2">
                  Lokasi Posyandu Disekitar
                </h5>
                <a href="{{ route('/DaftarPosyandu') }}#maps">Lihat Lokasi</a>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>
</div>
<!-- end offer section -->

<!-- food section -->

<section class="food_section layout_padding-bottom">
  <div class="heading_container heading_center psudo_white_primary galeri-h2">
    <h2>
      Galeri
    </h2>
  </div>
  <div class="container mt-4">
    <div class="row">
      @foreach($posyandus as $posyandu)
      <div class="col-md-4 mb-4 gallery-item">
        <img src="{{ asset('storage/posyandu_images/' . $posyandu->gambar) }}" class="gallery-img" alt="Gambar dengan aspek rasio 4:3">
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- end food section -->

<!-- Artikel section -->

<section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary">
        <h2>
          Artikel Terbaru
        </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">
          @foreach($artikels as $artikel)
          <div class="item-artikel">
            <div class="">
                <section class="container my-5">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <!-- Article Card -->
                            <div class="card card-artikel">
                                <!-- Image -->
                                @if($artikel->gambar)
                                    <a href="{{ route('artikel.show_by_slug', $artikel->slug) }}"><img src="{{ asset('storage/artikel_images/' . $artikel->gambar) }}" class="card-img-top artikel-img" alt="{{ $artikel->judul }}"></a>
                                @else
                                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $artikel->judul }}">
                                @endif
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- Release Date -->
                                    <p class="card-text"><small class="text-muted">Dirilis pada: {{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }}</small></p>
                                    <!-- Article Title -->
                                    <h5 class="card-title"><a href="{{ route('artikel.show_by_slug', $artikel->slug) }}">{{ $artikel->judul }} </a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
  
  <!-- end Artikel section -->
@endsection
