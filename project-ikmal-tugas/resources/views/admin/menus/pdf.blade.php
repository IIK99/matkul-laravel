<!DOCTYPE html>
<html>
<head>
    <title>Menus Report</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h2 { margin: 0; color: #333; }
        .header p { margin: 5px 0; color: #666; }
        .price { text-align: right; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Aldi's Burger - Menus Report</h2>
        <p>Generated on: {{ now()->format('d M Y H:i:s') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($menus as $index => $menu)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $menu->title }}</td>
                <td>{{ ucfirst($menu->category) }}</td>
                <td>{{ $menu->description }}</td>
                <td class="price">$ {{ number_format($menu->price, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
