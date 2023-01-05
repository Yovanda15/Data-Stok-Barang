<table class="table">
    @foreach ($barangs as $barang)
        <tr>
            <td><h5 id="{{$barang->namabarang}}"  value="{{$barang->namabarang}}" onclick="gantivalue(this.id)"  class="col-12 nav-link btn-white btn">{{$barang->namabarang}}</h5></td>
        </tr>
    @endforeach
</table>