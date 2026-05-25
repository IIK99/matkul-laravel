<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak PDF</title>
</head>

<body>
    <center>
        <h2 style="text-align: center;">Detail Project</h2>
        <img src="{{ public_path('bootstrap-5.3.8-dist/images/' . $project->image) }}" alt="{{ $project->title }}"
            width="200">
        <h3>{{ $project->title }}</h3>
        <p>{{ $project->description }}</p>
        <p><strong>Teknologi:</strong> {{ $project->teknologi }}</p>
        <p><strong>Status:</strong> {{ $project->status }}</p>
    </center>
</body>

</html>