@extends('master.tamplate')
@section('navigasi')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="{{ url('/adminpenerbit') }}">Manage Penerbit</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Penerbit </li>
    </ol>
</nav>
@endsection
@section('button')
<div class="mb-3 mt-3 ">
  <a href="{{route('admin.penerbit')}}"><button class="btn btn-warning"><i class="fa-solid fa-arrow-left me-2"></i>Back</button></a>
</div>
@endsection
@section('konten')
<div class="col-xxl">
    <div class="card mb-4">
      <div class="card-body">
        <small class="text-danger">(*) Wajib di isi.</small>
        <form action="{{ route('penerbit.update', $data->id) }}" method="post">
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
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Nama <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-user"></i></span>
                <input type="text" name="nama" value="{{ $data->nama }}" class="form-control @error('nama') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Masukkan Nama Penerbit" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('nama')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Kota <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-home"></i></span>
                <input type="text" name="kota" value="{{ $data->kota }}" class="form-control @error('kota') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Masukkan Nama Kota" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('kota')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
            <label class="col-sm-2 col-md-2 col-form-label" for="basic-icon-default-fullname">Telepon <span class="text-danger">*</span></label>
            <div class="col-sm-10 col-md-4">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-fullname2" class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                <input type="number" name="telepon" value="{{ $data->telepon }}" class="form-control @error('telepon') is-invalid @enderror" id="basic-icon-default-fullname" placeholder="Masukkan No Telepon" aria-label="John Doe" aria-describedby="basic-icon-default-fullname2">
              </div>
              @error('telepon')
                  <p class="text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 form-label" for="basic-icon-default-message">Alamat </label>
            <div class="col-sm-10">
              <div class="input-group input-group-merge">
                <span id="basic-icon-default-message2"  class="input-group-text"><i class="fa-solid fa-map"></i></span>
                <textarea id="basic-icon-default-message" name="alamat" class="form-control" placeholder="alamat" aria-describedby="basic-icon-default-message2">{{ $data->alamat }}"</textarea>
              </div>
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