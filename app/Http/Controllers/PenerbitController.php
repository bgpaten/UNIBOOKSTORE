<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
{

    public $penerbit;
    public function __construct()
    {
        $this->penerbit = new Penerbit();
    }
    public function index()
    {
        // $data = DB::table('buku')
        //     ->select('buku.nama_buku', 'penerbit.nama_penerbit')
        //     ->join('penerbit', 'buku.penerbit_id', '=', 'penerbit.id')
        //     ->orderBy('buku.stok', 'asc')
        //     ->first();

        // return view('dashboard', compact('data'));

        $data = Penerbit::all();

        return view('adminpenerbit', compact('data'));
    }

    public function create()
    {
        return view('penerbit.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'kode' => 'required|max:20',
            'nama' => 'required|max:500',
            'alamat' => 'required',
            'kota' => 'required|max:100',
            'telepon' => 'required|max:20',
        ];
        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'max' => ':attribute ukuran/jumlah tidak sesuai',
        ];

        $this->validate($request, $rules, $messages);

        $this->penerbit->kode = $request->kode;
        $this->penerbit->nama = $request->nama;
        $this->penerbit->alamat = $request->nama_penerbit;
        $this->penerbit->kota = $request->kota;
        $this->penerbit->telepon = $request->telepon;

        $this->penerbit->save();

        Alert::success('Sukses', 'Data buku berhasil ditambahkan');
        return redirect()->route('admin.penerbit');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
