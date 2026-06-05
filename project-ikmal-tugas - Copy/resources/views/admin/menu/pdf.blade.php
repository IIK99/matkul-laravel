<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Menus - PDF</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Menus</h2>
    <table>
        <thead>
            <trj>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
            </trj>
        </thead>
        <tbody>
            @foreach($menus as $menu)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img src="{{ public_path('feane-assets/images/') . $menu->image }}" alt="{{ $menu->title }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                    </td>
                    <td>{{ $menu->title }}</td>
                    <td>{{ $menu->category }}</td>
                    <td>{{ $menu->description }}</td>
                    <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>