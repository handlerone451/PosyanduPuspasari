@extends('layouts.layout')

@section('title', 'Home Page')

@section('content')





<!-- food section -->

<div class="container col-lg-8 mx-auto">
    <div class="heading_daftar_kegiatan heading_center text-center mt-4">
        <h2 class="">
         {{ $artikel->judul }}
        </h2>
        <h6>
            {{ $artikel->created_at->locale('id')->translatedFormat('l, d F Y H:i') }}
        </h6>
        @if($artikel->gambar)
            <img src="{{ asset('storage/artikel_images/' . $artikel->gambar) }}" class="card-img-top artikel-show-img" alt="{{ $artikel->judul }}">
        @else
            <img src="https://via.placeholder.com/150" class="card-img-top" alt="{{ $artikel->judul }}">
            @endif   
    </div>
    <div class="isi-artikel">
        <p>{!! nl2br(e($artikel->isi)) !!}</p>
    </div>
</div>






@endsection
