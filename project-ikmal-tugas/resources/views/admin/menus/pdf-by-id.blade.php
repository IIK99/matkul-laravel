<!DOCTYPE html>
<html>
<head>
    <title>Menu Detail - {{ $menu->title }}</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; border: 1px solid #ddd; padding: 20px; }
        .header { text-align: center; border-bottom: 2px solid #ffbe33; padding-bottom: 10px; margin-bottom: 20px; }
        .header h1 { margin: 0; color: #333; font-size: 24px; }
        .content { margin-bottom: 20px; }
        .label { font-weight: bold; width: 120px; display: inline-block; color: #555; }
        .value { color: #222; }
        .price { font-size: 20px; font-weight: bold; color: #16a34a; margin-top: 15px; }
        .footer { text-align: center; margin-top: 30px; font-size: 12px; color: #888; border-top: 1px solid #ddd; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Aldi's Burger</h1>
            <p>Menu Detail Report</p>
        </div>

        <div class="content">
            <p><span class="label">Menu Title:</span> <span class="value">{{ $menu->title }}</span></p>
            <p><span class="label">Category:</span> <span class="value">{{ ucfirst($menu->category) }}</span></p>
            <p><span class="label">Description:</span> <br> <span class="value">{{ $menu->description }}</span></p>
            @if($menu->composition)
            <p><span class="label">Composition:</span> <br> <span class="value">{{ $menu->composition }}</span></p>
            @endif
            <div class="price">Price: $ {{ number_format($menu->price, 0, ',', '.') }}</div>
        </div>

        <div class="footer">
            Printed on {{ now()->format('d M Y H:i:s') }}
        </div>
    </div>
</body>
</html>
