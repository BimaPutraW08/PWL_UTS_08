<?php

namespace App\Http\Controllers;
use App\Models\dataBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Search
        $search =$request->search;
        if(strlen($request->search)){
            $dataBarang = dataBarang::where('kode_barang', 'like', "%$search%")
            ->orWhere('nama_barang', 'like', "%$search%")
            ->orWhere('kategori_barang', 'like', "%$search%")
            ->paginate(6);
        } else {
            $dataBarang = DB::table('dataBarang')->paginate(6);   
                    //fungsi eloquent menampilkan data menggunakan pagination 
        // $mahasiswas = Mahasiswa::all(); // Mengambil semua isi tabel
        // $posts = Mahasiswa::orderBy('Nim', 'desc')->paginate(5);   
        }
        return view('dataBarang.index', ['dataBarang' => $dataBarang]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dataBarang.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'kode_barang' => 'required', 
            'nama_barang' => 'required',
            'kategori_barang' => 'required', 
            'harga' => 'required', 
            'qty' => 'required', 
        ]); 

        //fungsi eloquent untuk menambah data 
        dataBarang::create($request->all()); 
 
        //jika data berhasil ditambahkan, akan kembali ke halaman utama         
        return redirect()->route('dataBarang.index')->with('success', 'Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kode_barang)
    {
        //menampilkan detail data dengan menemukan/berdasarkan 
        $dataBarang = dataBarang::find($kode_barang); 
        return view('dataBarang.detail', compact('dataBarang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kode_barang)
    {
        //menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit 
        $dataBarang = dataBarang::find($kode_barang); 
        return view('dataBarang.edit', compact('dataBarang'));
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
        //validasi
        $request->validate([ 
            'kode_barang' => 'required', 
            'nama_barang' => 'required',
            'kategori_barang' => 'required', 
            'harga' => 'required', 
            'qty' => 'required',
        ]); 

         //fungsi eloquent untuk mengupdate data inputan kita 
         dataBarang::find($kode_barang)->update($request->all());  
         //jika data berhasil diupdate, akan kembali ke halaman utama 
             return redirect()->route('dataBarang.index')->with('success', 'Data Barang Berhasil Diupdate'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_barang)
    {
        //fungsi eloquent untuk menghapus data 
        dataBarang::find($kode_barang)->delete(); 
        return redirect()->route('dataBarang.index')-> with('success', 'Data Barang Berhasil Dihapus'); 
    }
}
