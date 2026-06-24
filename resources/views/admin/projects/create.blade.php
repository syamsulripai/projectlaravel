@extends('admin.template')

@section('title', 'Tambah Project')

@section('content')

<div class="card shadow border-0">

    <!-- Header -->
    <div class="card-header">
        <h5 class="mb-0">Tambah Project</h5>
    </div>

    <!-- Body -->
    <div class="card-body">

        <form action="{{ route('projects.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <!-- Row 1 -->
            <div class="row">

                <!-- Nama Project -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Nama Project
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control"
                           placeholder="Masukkan nama project">

                </div>

                <!-- Teknologi -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Teknologi
                    </label>

                    <input type="text"
                           name="teknologi"
                           class="form-control"
                           placeholder="Contoh: Laravel, Bootstrap">

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
                           class="form-control"
                           placeholder="Contoh: Selesai">

                </div>

                <!-- Image -->
                <div class="col-md-6 mb-3">

                    <label class="form-label">
                        Image
                    </label>

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
                          class="form-control"
                          placeholder="Masukkan deskripsi project"></textarea>

            </div>

            <!-- Button -->
            <div class="mt-4">

                <button type="submit"
                        class="btn btn-primary">

                    Simpan

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