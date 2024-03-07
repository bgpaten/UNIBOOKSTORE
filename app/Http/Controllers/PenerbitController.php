<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use App\Models\Buku;
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
        $this->penerbit->alamat = $request->alamat;
        $this->penerbit->kota = $request->kota;
        $this->penerbit->telepon = $request->telepon;

        $this->penerbit->save();

        Alert::success('Sukses', 'Data buku berhasil ditambahkan');
        return redirect()->route('admin.penerbit');
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {

        $data = Penerbit::findOrFail($id);
        return view('penerbit.edit', compact('data', ));
    }

    public function update(Request $request, $id)
    {
        $update = Penerbit::findOrFail($id);

        $update->kode = $request->kode;
        $update->nama = $request->nama;
        $update->alamat = $request->alamat;
        $update->kota = $request->kota;
        $update->telepon = $request->telepon;

        if ($update->isDirty()) {
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

            $update->kode = $request->kode;
            $update->nama = $request->nama;
            $update->alamat = $request->alamat;
            $update->kota = $request->kota;
            $update->telepon = $request->telepon;

            $update->save();

            Alert::success('Success!', 'Data berhasil diupdate');
            return redirect()->route('admin.penerbit');
        } else {
            Alert::info('Info!', 'Data yang diupdate tidak boleh sama dengan data sebelumnya');
            return redirect()->route('admin.penerbit');
        }
    }

    public function destroy(string $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        Alert::success('Successfull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('admin.penerbit');
    }
    public function pengadaan()
    {

        $data = DB::table('buku')
        ->select('buku.id', 'buku.nama_buku', 'buku.stok', 'penerbit.nama')
        ->join('penerbit', 'buku.penerbit_id', '=', 'penerbit.id')
        ->orderBy('buku.stok', 'asc')
        ->first();
    
    return view('pengadaan', compact('data'));
    }
}
