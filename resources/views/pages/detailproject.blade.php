@extends('layouts.app')
@section('title','Projects Detail')
@section('content')
<div class="mt-5">

    <div class="row mt-4 justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card shadow-sm">
                <img src="{{ asset('bootstrap-5.3.8-dist/images/'.$project->image) }}" alt="{{ $project->title }}" class="card-img-top" style="max-height: 400px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <div class="mb-4">
                        <h5>Deskripsi Project</h5>
                        <p>{{ $project->description }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h5>teknologi yang digunakan</h5>
                                <span class="badge bg-primary">{{ $project->teknologi }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4">
                                <h5>Status Projects</h5>
                                <span class="badge bg-success">{{ $project->status }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('projects') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection