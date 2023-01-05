<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\stokbarang;
use App\Models\stokkeluar;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class stokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_barang');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'namabarang'=>['required'],
            'deskripsi'=>['required'],
            'jumlah'=>['required'],
        ]);

        stokbarang::create($validated);

        return redirect('/barang-masuk')->with('success', 'Barang Anda Sudah masuk');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("detail_barang_keluar",[
            'barangs'=>stokbarang::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated=$request->validate([
            'namabarang'=>['required'],
            'deskripsi'=>['required'],
        ]);

        stokbarang::find($id)->update($validated);

        return redirect('/dashboard')->with('success', 'Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        stokbarang::find($id)->delete();
        stokkeluar::where('stokbarang_id',$id)->delete();
        return redirect('/dashboard')->with('success', 'Berhasil Delete');
    }
    public function barangMasuk()
    {
        return view('barang_masuk',[
            'stoks'=>stokbarang::paginate(10)
        ]);
    }
    public function barangKeluar()
    {
        return view('barang_keluar',[
            'barangs'=>stokbarang::orderBy('namabarang', 'ASC')->get()
        ]);
    }
    public function prosesBarangKeluar(Request $request)
    {
        $validated=$request->validate([
            'stokbarang_id'=>['required'],
            'keterangan'=>['required'],
            'jumlahkeluar'=>['required']
        ]);

        stokkeluar::create($validated);
        $getjumlahlama = stokbarang::find($request['stokbarang_id'])->jumlah;
        $hasil = $getjumlahlama - $request['jumlahkeluar'];

        if ($hasil<0){
            return redirect ('/barang-keluar')->with('failed', 'Melebihi Jumlah Stok Yang Ada');
        };
        if( $hasil){
            stokbarang::find($request['stokbarang_id'])->update([
                "jumlah"=>$hasil
            ]);
            return redirect ('/barang-keluar')->with('success', 'Barang Sudah Keluar');
        }
       return "gagal";

      
    }

    public function ajax($str)
    {
        return view('ajax',[
            'barangs'=>  stokbarang::where('namabarang', 'like', '%'.$str.'%')
            ->orwhere('deskripsi', 'like', '%'.$str.'%')->get()
        ]);
    }

    public function download(){
        $pdf = Pdf::loadView('table', [
            'datas'=>stokbarang::all()
        ]);
        return $pdf->download('laporan.pdf');
    }
}
