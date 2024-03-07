<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    public $buku;
    public function __construct()
    {
        $this->buku = new Buku();
    }

    public function index(Request $request)
    {

        $penerbit = Penerbit::all();
        $cari = $request->input('search');
        $data = DB::table('buku')
            ->where('nama_buku', 'LIKE', "%$cari%")
            ->join('penerbit', 'buku.penerbit_id', '=', 'penerbit.id')
            ->get();

        return view('dashboard', compact('data', 'cari', 'penerbit'));
    }

    public function indexadmin(Request $request)
    {
        $data = Buku::all();

        return view('adminbuku', compact('data'));
    }

    public function create()
    {
        $penerbit = Penerbit::all();
        return view('buku.create', compact('penerbit'));
    }

    public function store(Request $request)
    {
        $rules = [
            'kode' => 'required|max:20',
            'kategori' => 'required|max:20',
            'nama_buku' => 'required|max:500',
            'harga' => 'required|max:20',
            'stok' => 'required|max:20',
        ];
        $messages = [
            'required' => ':attribute gak boleh kosong masseeh',
            'max' => ':attribute ukuran/jumlah tidak sesuai',
        ];

        $this->validate($request, $rules, $messages);

        $this->buku->kode = $request->kode;
        $this->buku->kategori = $request->kategori;
        $this->buku->nama_buku = $request->nama_buku;
        $this->buku->harga = $request->harga;
        $this->buku->stok = $request->stok;
        $this->buku->penerbit_id = $request->penerbit;

        $this->buku->save();

        Alert::success('Sukses', 'Data buku berhasil ditambahkan');
        return redirect()->route('admin.buku');
    }

    public function show(string $id)
    {

    }


    public function edit($id)
    {
        $penerbit = Penerbit::all();
        $data = Buku::findOrFail($id);
        return view('buku.edit', compact('data', 'penerbit'));
    }

    public function update(Request $request, $id)
    {
        $update = Buku::findOrFail($id);

        $update->kode = $request->kode;
        $update->kategori = $request->kategori;
        $update->nama_buku = $request->nama_buku;
        $update->harga = $request->harga;
        $update->stok = $request->stok;
        $update->penerbit_id = $request->penerbit;

        if ($update->isDirty()) {
            $rules = [
                'kode' => 'required|max:20',
                'kategori' => 'required|max:20',
                'nama_buku' => 'required|max:500',
                'harga' => 'required|max:20',
                'stok' => 'required|max:20',
            ];
            $messages = [
                'required' => ':attribute gak boleh kosong masseeh',
                'max' => ':attribute ukuran/jumlah tidak sesuai',
            ];

            $this->validate($request, $rules, $messages);

            $update->kode = $request->kode;
            $update->kategori = $request->kategori;
            $update->nama_buku = $request->nama_buku;
            $update->harga = $request->harga;
            $update->stok = $request->stok;
            $update->penerbit_id = $request->penerbit;

            $update->save();

            Alert::success('Success!', 'Data berhasil diupdate');
            return redirect()->route('admin.buku');
        } else {
            Alert::info('Info!', 'Data yang diupdate tidak boleh sama dengan data sebelumnya');
            return redirect()->route('admin.buku');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        Alert::success('Successfull', 'Data Berhasil di Hapus');
        // redirect
        return redirect()->route('admin.buku');
    }
}
