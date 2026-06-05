<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Menu - PDF</title>
    <style>
        body { font-family: sans-serif; }
        .menu-detail { margin-top: 20px; }
        .menu-detail p { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Detail Menu</h2>
    <div class="menu-detail">
        <p><strong>Title:</strong> {{ $menu->title }}</p>
        <p><strong>Category:</strong> {{ $menu->category }}</p>
        <p><strong>Description:</strong> {{ $menu->description }}</p>
        <p><strong>Composition:</strong> {{ $menu->composition }}</p>
        <p><strong>Price:</strong> Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
    </div>
</body>
</html>