@extends('layouts.app')
@section('title','Projects')
@section('content')
<div class="mt-5">

    <div class="row mt-4 text-center">
        @forelse ($projects as $project)
        <div class="col-md-4 mt-4">
            <div class="card h-100">
                <img src="{{ asset('bootstrap-5.3.8-dist/images/'.$project->image) }}" alt="{{ $project->title }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-muted">{{ $project->teknologi }}</p>
                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-success">Lihat Detail</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Belum Ada data Projects
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection