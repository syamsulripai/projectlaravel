@extends('admin.template')

@section('title', 'Dashboard')

@section('content')

<div class="main-content">
    <div class="container-fluid">
        <div class="d-flex justify-content-between mb-3 py-3">

            <h3>Data Projects</h3>

            <div>
                <a href="{{ route('projects.create') }}" class="btn btn-primary">
                    Tambah Project
                </a>

                <a href="{{ route('projects.pdf') }}" 
                   class="btn btn-danger" 
                   target="_blank">
                    Cetak PDF
                </a>
            </div>

        </div>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered align-middle" id="table_project">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Teknologi</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <!-- Image -->
                            <td>
                                @if($project->image)
                                <img src="{{ asset('bootstrap-5.3.8-dist/images/' . $project->image) }}"
                                     alt="{{ $project->title }}"
                                     class="img-thumbnail"
                                     style="max-width: 100px;">
                                @else
                                <span>No Image</span>
                                @endif
                            </td>
                            <!-- Title -->
                            <td>{{ $project->title }}</td>
                            <!-- Teknologi -->
                            <td>{{ $project->teknologi }}</td>
                            <!-- Description -->
                            <td>{{ $project->description }}</td>
                            <!-- Status -->
                            <td>
                                <span class="badge bg-success">
                                    {{ $project->status }}
                                </span>
                            </td>
                            <!-- Action -->
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- Edit -->
                                    <a href="{{ route('projects.edit', $project->id) }}"
                                       class="btn btn-primary btn-sm">
                                        Edit
                                    </a>
                                    <!-- Delete -->
                                    <form action="{{ route('projects.destroy', $project->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function () {
        $('#table_project').DataTable();
    });
</script>
@endsection