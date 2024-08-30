@extends('layouts.layout')

@section('title', 'Home Page')

@section('content')





<!-- end offer section -->

<!-- food section -->

<section class="food_section layout_padding-bottom">
  <div class="container">
    <div class="heading_daftar_posyandu heading_center row justify-content-center">
      <h2 class="">
        Daftar  Posyandu
      </h2>
    </div>
    <div class="row">
      @foreach($posyandus as $posyandu)
          <div class="col-md-4 mb-4">
              <div class="card card-page-posyandu shadow-box">
                @if($posyandu->gambar)
                      <a href=""><img src="{{ asset('storage/posyandu_images/' . $posyandu->gambar) }}" class="card-img-top posyandu-img" alt="{{ $posyandu->nama }}"></a>
                  @else
                      <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $posyandu->nama }}">
                  @endif            
                  <div class="card-body">
                      <h5>
                        {{ $posyandu->nama }}
                      </h5>
                      <p>
                        {{ $posyandu->alamat }} RW {{ $posyandu->rw }}
                      </p>
                      <div class="justify-content-center button-kegiatan">
                        <a href="{{ route('posyandu.show_by_nama', $posyandu->nama) }}" class="text-white">
                          Kegiatan
                        </a>
                      </div>
                  </div>
              </div>
          </div>
          @endforeach
  
</section>

<!-- end food section -->


@endsection
