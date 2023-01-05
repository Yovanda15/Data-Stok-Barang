@extends('layout.sidebar')

@section('body')
<main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Stok Barang</h1>
                            <div class="card mb-4">
                            @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            @endif
                            </div>
                            <div class="d-flex me-5 justify-content-end">
                                <a href="/download" class="btn btn-success">Laporkan</a>
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
                                            <td>{{$stok->jumlah}}
                                            <div class="dropdown ms-3 d-inline">
                                                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
                                                </svg>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item">
                                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#edit{{$stok->id}}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-vector-pen text-warning" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M10.646.646a.5.5 0 0 1 .708 0l4 4a.5.5 0 0 1 0 .708l-1.902 1.902-.829 3.313a1.5 1.5 0 0 1-1.024 1.073L1.254 14.746 4.358 4.4A1.5 1.5 0 0 1 5.43 3.377l3.313-.828L10.646.646zm-1.8 2.908-3.173.793a.5.5 0 0 0-.358.342l-2.57 8.565 8.567-2.57a.5.5 0 0 0 .34-.357l.794-3.174-3.6-3.6z"/>
                                                        <path fill-rule="evenodd" d="M2.832 13.228 8 9a1 1 0 1 0-1-1l-4.228 5.168-.026.086.086-.026z"/>
                                                        </svg>
                                                        Edit</button>
                                                    </li>
                                                    <li class="dropdown-item"> 
                                                        <form method="post" class="d-inine" action="/stok/{{$stok->id}}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item" name="hapusbarang">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill text-danger" viewBox="0 0 16 16">
                                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                            </svg>
                                                            Delete</button>
                                                        </form>
                                                    </li>
                                               
                                                </ul>
                                            </div>
                                               
                                            </td>
                                        </tr>

                                              <!-- Edit --->
                                              <div class="modal fade" id="edit{{$stok->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Edit Barang</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

                                                        <!-- Modal body -->
                                                        <form method="post" action="/stok/{{$stok->id}}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-label">Nama Barang</div>
                                                                <input type="text" name="namabarang" value="{{$stok->namabarang}}" class="form-control" required>
                                                                <br>
                                                                <div class="form-label">Deskripsi</div>
                                                                <input type="text" name="deskripsi" value="{{$stok->deskripsi}}" class="form-control" required>
                                                                <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
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

                    
@endsection