@extends('layout.sidebar')

@section('body')
<main>
                        <div class="container-fluid px-4">
                            </div>
                            <div class="card-body">
                                <h3 class="text-center m-2">{{$barangs->namabarang}}</h3>
                                <table class='table mt-5'>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal</th>
                                            <th>Stock Keluar</th>
                                        </tr>
                                    </thead>
                                    @foreach ($barangs->stokkeluar as $stokkeluar)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$stokkeluar->keterangan}}</td>
                                            <td>{{$stokkeluar->created_at}}</td>
                                            <td>{{$stokkeluar->jumlahkeluar}}</td>
                                        </tr>
                                    @endforeach
                                    
                     
                                </table>
                            </div>
                        </div>

</main> 
@endsection