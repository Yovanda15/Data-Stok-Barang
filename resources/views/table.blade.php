<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">Laporan Stok Barang</h3>
    <table class="table">
        <tr>
            <td>No</td>
            <td>Nama Barang</td>
            <td>Deskripsi</td>
            <td>Tanggal</td>
            <td>Stok</td>
        </tr>
        @foreach ($datas as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data->namabarang}}</td>
            <td>{{$data->deskripsi}}</td>
            <td>{{$data->created_at}}</td>
            <td>{{$data->jumlah}}</td>
        </tr>
            
        @endforeach
    </table>
</body>
</html>


