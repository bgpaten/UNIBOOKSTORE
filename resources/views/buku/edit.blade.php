@extends('master.tamplate')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/adminbuku') }}">Manage Buku</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Buku </li>
    </ol>
</nav>
@endsection
@section('button')
<div class="mb-3 mt-3 ">
  <a href="{{route('admin.buku')}}"><button class="btn btn-warning"><i class="fa-solid fa-arrow-left me-2"></i>Back</button></a>
</div>
@endsection
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <small class="text-danger">(*) Wajib di isi.</small>
        <form action="{{ route('buku.update', $data->id) }}" method="post">
            @method('PUT')
            @csrf
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kode <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-shield"></i></span>
                <input type="text" name="kode" value="{{ $data->kode }}" class="form-control @error('kode') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Masukkan Kode Buku" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('kode')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kategori <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-box"></i></span>
                <input type="text" name="kategori" value="{{ $data->kategori }}" class="form-control @error('kategori') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Masukkan Kategori Buku" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('kategori')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama Buku <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-book"></i></span>
                <input type="text" name="nama_buku" value="{{ $data->nama_buku }}" class="form-control @error('nama_buku') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Masukkan Nama Buku" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('nama_buku')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Harga <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-dollar"></i></span>
                <input type="number" name="harga" value="{{ $data->harga }}" class="form-control @error('harga') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Masukkan Harga buku" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('harga')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Stok <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-database"></i></span>
                <input type="number" name="stok" value="{{ $data->stok }}" class="form-control @error('stok') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Masukkan Stok Buku" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('stok')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Penerbit <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-clipboard"></i></span>
                <select id="defaultSelect" class="form-select @error('penerbit') is-invalid @enderror" name="penerbit" value="{{old('penerbit')}}">
                    <option hidden>Pilih Penerbit Buku</option>
                    @foreach ($penerbit as $bit)
                    <option value="{{$bit->id}}" {{ old('penerbit', $data->penerbit_id) == $bit->id ? 'selected' : '' }}>{{$bit->nama}}</option>
                    @endforeach
                  </select>
              </div>
              @error('penerbit')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane me-2"></i>Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection