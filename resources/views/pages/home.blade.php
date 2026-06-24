@extends('layouts.app')

@section('title', 'Home')

@section('content')




<div class="mt-5">
    <div class="text-center">
        <h1 class="display-4 mb-3">Halo, Saya M. Syamsul Ripai</h1>
        <img src="{{ asset('bootstrap-5.3.8-dist/images/images.jpeg') }}" width="200" alt="Foto Profil">
        <p class="lead">
            Saya seorang web developer dari Universitas Pamulang
        </p>

        <hr class="my-4">

        <p>Selamat datang di halaman profile saya</p>
    </div>

    <div class="row mt-4 text-center">
        <div class="col-md-4">
            <div class="card p-3">
                <h5>Pengalaman</h5>
                <p>2 tahun pengalaman</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Project</h5>
                <p>10+ project selesai</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card p-3">
                <h5>Client</h5>
                <p>20 client</p>
            </div>
        </div>
    </div>
</div>
@endsection