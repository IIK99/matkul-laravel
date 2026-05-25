<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2 class="text-align: center;">Project Data</h2>
                <table border="1" cellspacing="0" cellpadding="10" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Technologies</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ public_path('bootstrap-5.3.8-dist/images/' . $project->image) }}" alt="{{ $project->title }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                </td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->teknologi }}</td>
                                <td>{{ $project->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
</body>
</html>