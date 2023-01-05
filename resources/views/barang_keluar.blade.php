@extends('layout.sidebar')

@section('body')
<main>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Barang Keluar</h1>
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
                                        Tambah Barang Keluar
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class='table'>
                                    <thead>
                                        <tr>
                                            <th class="text-center">No</th>
                                            <th class="text-center">Nama Barang</th>
                                            <th class="text-center">Detail</th>
                                        </tr>
                                        @foreach ($barangs as $barang)
                                            <tr>
                                                <td class="text-center">{{$loop->iteration}}</td>
                                                <td class="text-center">{{$barang->namabarang}}</td>
                                                <td class="text-center"><a href="/stok/{{$barang->id}}" class="btn btn-success">Detail</a></td>
                                               
                                                {{-- <td>{{$barang->stokkeluar->created_at}}</td>
                                                <td>{{$barang->stokkeluar->}}</td> --}}
                                            </tr>
                                        @endforeach
                                   
                                </table>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div>
                           
                            </div>
                        </div>
</main>

                       <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Barang Keluar</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <form method="post" action="/barang-keluar">
                        @csrf
                        <div class="modal-body">
                            {{-- <input type="text" name="namabarang" placeholder="Nama Barang" value="" onkeyup="ajax(this.value)" id="namabarang" class="form-control" required> --}}
                            <div id="txtHint"></div>
                            <select name="stokbarang_id" id="" class="form-control">
                                @foreach ($barangs as $barang)
                                <option value="{{$barang->id}}"> {{$barang->namabarang}} </option>
                                @endforeach
                            </select>
                            <br>
                            <input type="text" name="keterangan" placeholder="Keterangan" class="form-control" required>
                            </br>
                            <input type="number" name="jumlahkeluar" placeholder="jumlah barang" class="form-control" required>
                            </br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
<script>
function ajax(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","/ajax/"+str,true);
    xmlhttp.send();
  }
}

function gantivalue(str){
    const getdata=document.getElementById(str).value;
    const data = document.getElementById("namabarang").value = getdata;
    console.log(data)
}
</script>
@endsection