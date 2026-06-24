@extends('admin.template')

@section('title', 'Edit Project')

@section('content')

<div class="card shadow border-0">

    <!-- Header -->
    <div class="card-header">
        <h5 class="mb-0">Edit Project</h5>
    </div>

    <!-- Body -->
    <div class="card-body">

        <form action="{{ route('projects.update', $project->id) }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Row 1 -->
            <div class="row">

                <!-- Nama Project -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Nama Project
                    </label>

                    <input type="text"
                           name="title"
                           value="{{ $project->title }}"
                           class="form-control">

                </div>

                <!-- Teknologi -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Teknologi
                    </label>

                    <input type="text"
                           name="teknologi"
                           value="{{ $project->teknologi }}"
                           class="form-control">

                </div>

            </div>

            <!-- Row 2 -->
            <div class="row">

                <!-- Status -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Status
                    </label>

                    <input type="text"
                           name="status"
                           value="{{ $project->status }}"
                           class="form-control">

                </div>

                <!-- Image -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Image
                    </label>

                    <br>

                    <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $project->image) }}"
                         width="120"
                         class="mb-2 rounded">

                    <input type="file"
                           name="image"
                           class="form-control">

                </div>

            </div>

            <!-- Description -->
            <div class="mb-3">

                <label class="form-label">
                    Description
                </label>

                <textarea name="description"
                          rows="5"
                          class="form-control">{{ $project->description }}</textarea>

            </div>

            <!-- Button -->
            <div class="mt-4">

                <button type="submit"
                        class="btn btn-primary">

                    Update

                </button>

                <a href="{{ route('projects.index') }}"
                   class="btn btn-danger">

                    Batal

                </a>

            </div>

        </form>

    </div>

</div>

@endsection