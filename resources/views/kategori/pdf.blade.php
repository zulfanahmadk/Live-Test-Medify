<html>
<head>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        .footer { position: fixed; bottom: 0; width: 100%; text-align: right; font-size: 10px; }
    </style>
</head>
<body>
    <h2>Laporan Detail Kategori</h2>
    <p><strong>Nama Kategori:</strong> {{ $kategori->nama_kategori }}</p>
    <p><strong>Kode Kategori:</strong> {{ $kategori->kode_kategori }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Item</th>
                <th>Supplier</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategori->masterItems as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->supplier }}</td>
                <td>Rp {{ number_format($item->harga_beli) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada: {{ $date }}
    </div>
</body>
</html>