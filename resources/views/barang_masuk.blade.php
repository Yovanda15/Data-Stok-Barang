@extends('layout.sidebar')

@section('body')
<main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Barang Masuk</h1>
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            <ol class="breadcrumb mb-4">
                            </ol>
                            <div class="card mb-4">
                                <div class="card-header">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                        Tambah Barang
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal</th>
                                            <th>Stock</th>
                                        </tr>
                                    </thead>
                                    @foreach($stoks as $stok)
                                    <tr>
                                            <td>{{$loop->iteration + $stoks->firstItem() - 1}}</td>
                                            <td>{{$stok->namabarang}}</td>
                                            <td>{{$stok->deskripsi}}</td>
                                            <td>{{\Carbon\Carbon::parse($stok->created_at)->toDayDateTimeString()}}</td>
                                            <td>{{$stok->jumlah}}</td>
                                        </tr>
                                    @endforeach
                                   
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                            {{$stoks->links()}}
                            </div>
                        </div>
</main>

                       <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Barang</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <form method="post" action="/stok">
                        @csrf
                        <div class="modal-body">
                            <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
                            <br>
                            <input type="text" name="deskripsi" placeholder="diskripsi barang" class="form-control" required>
                            </br>
                            <input type="number" name="jumlah" placeholder="jumlah barang" class="form-control" required>
                            </br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
                    
@endsection