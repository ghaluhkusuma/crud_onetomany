<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Eloquent Relationships : Relasi One to Many</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-body">
                <h3 class="text-center"><a href="https://santrikoding.com">www.santrikoding.com</a></h3>
                <h5 class="text-center my-4">Laravel Eloquent Relationship : One To Many</h5>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penjuals as $penjual)
                            <tr>
                                <td>{{ $penjual->nama }}</td>
                                <td>{{ $penjual->alamat }}</td>
                                <td>
                                    @foreach($penjual->produks()->get() as $produk)
                                        <div class="card shadow-sm mb-2">
                                            <div class="card-body">
                                                <i class="fa fa-comments"></i> {{ $produk->namaproduk }}
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($penjual->produks()->get() as $produk)
                                        <div class="card shadow-sm mb-2">
                                            <div class="card-body">
                                                <i class="fa fa-comments"></i> {{ $produk->harga }}
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>