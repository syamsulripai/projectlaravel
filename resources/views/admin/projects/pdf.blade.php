<!DOCTYPE html>
<html>
<head>
    <title>Laporan Project</title>
</head>

<body>

    <h1>Data Projects</h1>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Title</th>
                <th>Teknologi</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($projects as $index => $project)
            <tr>
                <td>{{ $index + 1 }}</td>

                <td>
                    @if($project->image)
                    <img src="{{ public_path('bootstrap-5.3.8-dist/images/'.$project->image) }}" alt="{{ $project->title }}"
                    style="max-width: 100px;">
                    @else
                    <span>No Image</span>
                    @endif
                </td>

                <td>{{ $project->title }}</td>

                <td>{{ $project->teknologi }}</td>

                <td>{{ $project->description }}</td>

                <td>{{ $project->status }}</td>
            </tr>
            @endforeach
        </tbody>

    </table>

</body>
</html>