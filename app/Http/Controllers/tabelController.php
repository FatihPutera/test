<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class tabelController extends Controller
{

    public function connect()
    {
        try {
            \DB::connection()->getPdo();
    
            echo 'Sudah terkoneksi dengan database: ' . \DB::connection()->getDatabaseName();
    
        } catch (\Exception $e) {
            echo 'Belum terkoneksi database, error: ' . $e->getMessage();
        }
    }
    public function index()
    {
    $x = DB::table('barang')->get();
    $data['data']=$x;
    // dd($data);
      return view('home.index',$data);
    }

    public function showadd()
    {
      return view('home.create');
    }


    public function add(Request $request)
    {
        // ->nama;
        // dd($request);   

       $x=DB::table('barang')->insert([
            'Nama_barang' => $request->nama,
            'Kode_barang' =>$request->kode,
            'Jumlah_barang' =>$request->jumlah,
            'Tanggal' =>$request->tanggal
        ]);
        $x = DB::table('barang')->get();
        $data['data']=$x;
        // dd($data);
          return view('home.index',$data);
    }
}
