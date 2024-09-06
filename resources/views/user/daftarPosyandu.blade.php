@extends('layouts.layout')

@section('title', 'Home Page')

@section('content')





<!-- end offer section -->

<!-- food section -->

<section class="food_section layout_padding-bottom">
  <div class="container">
    <div class="heading_daftar_posyandu heading_center">
      <h2 class="">
        Daftar  Posyandu
      </h2>
    </div>
    <div class="row">
<div class="container mt-5">
  <div class="row">
    @foreach($posyandus as $posyandu)
      <div class="col-md-4 mb-4">
        <div class="card card-page-posyandu shadow-box">
          @if($posyandu->gambar)
            <a href=""><img src="{{ asset('storage/posyandu_images/' . $posyandu->gambar) }}" class="card-img-top posyandu-img" alt="{{ $posyandu->nama }}"></a>
          @else
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $posyandu->nama }}">
          @endif       
          <div class="card-body text-center">
              <h5 class="card-title">{{ $posyandu->nama }}</h5>
              <p class="card-text card-text-posyandu">{{ $posyandu->alamat }} RW {{ $posyandu->rw }}</p>
              <div class="btn-container">
                <a href="{{ route('posyandu.show_by_nama', $posyandu->nama) }}" class="btn btn-primary btn-posyandu">Kegiatan</a>
              </div>
          </div>
        </div>
      </div>
      @endforeach
  </div>
</div>
</section>
{{-- maps section --}}
<section class="mb-4" id="maps">
  <div class="row justify-content-center">
    <div class="col-md-2 col-sm-4">
      <h1 class="text-center">Lokasi RW</h1>
      <select id="locationSelect" class="form-control select-location">
        <option value="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3964.415207476862!2d106.87579157499238!3d-6.468971493522721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjgnMDguMyJTIDEwNsKwNTInNDIuMSJF!5e0!3m2!1sid!2sid!4v1725189164168!5m2!1sid!2sid">RW 04</option>
        <option value="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3964.325857049712!2d106.8733886749926!3d-6.480350293511529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjgnNDkuMyJTIDEwNsKwNTInMzMuNSJF!5e0!3m2!1sid!2sid!4v1725189235844!5m2!1sid!2sid">RW 08</option>
        <option value="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3964.326703481778!2d106.86698027499256!3d-6.480242593511619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjgnNDguOSJTIDEwNsKwNTInMTAuNCJF!5e0!3m2!1sid!2sid!4v1725189315302!5m2!1sid!2sid">RW 02</option>
        <option value="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3964.415207476862!2d106.87579157499238!3d-6.468971493522721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjgnMDguMyJTIDEwNsKwNTInNDIuMSJF!5e0!3m2!1sid!2sid!4v1725189361160!5m2!1sid!2sid">RW 05</option>
      </select>
    </div>
  </div>
  <div class="row justify-content-center mt-4">
    <div class="col-md-8">
      <div class="embed-responsive embed-responsive-16by9">
        <iframe id="mapFrame" class="embed-responsive-item" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
          src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3964.415207476862!2d106.87579157499238!3d-6.468971493522721!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjgnMDguMyJTIDEwNsKwNTInNDIuMSJF!5e0!3m2!1sid!2sid!4v1725189164168!5m2!1sid!2sid"></iframe>
      </div>
    </div>
  </div>
</section>

<!-- end maps section ->
@endsection

@php
    $hideFooter = true;
@endphp