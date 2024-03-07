@extends('master.tamplate')
@section('navigasi')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Buku </li>
        </ol>
    </nav>
@endsection
@section('konten')
    <div class="table-responsive text-nowrap">
        <div class="navbar-nav align-items-center float-end mb-4">
            <div class="nav-item d-flex align-items-center">
                <div class="mb-3 mt-3 ">
                    <a href="{{ route('buku.create') }}"><button class="btn btn-primary" type="submit">Tambah Buku <i
                                class="bx bx-plus"></i></button></a>
                </div>
            </div>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Buku</th>
                    <th>Judul Buku</th>
                    <th>Sisa Stok</th>
                    <th>Penerbit</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @php
                    $no = 1;
                @endphp
                <div class="modal fade" id="{{ 'id' . $data->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="{{ 'id' . $data->id }}">Data {{ $data->nama_buku }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="col-4">
                                    <p>
                                    <ul>
                                        <li> ID Buku: {{ $data->id }}</li>
                                        <li>Judul Buku: {{ $data->nama_buku }}</li>
                                        <li>Nama Buku : {{ $data->nama_buku }}</li>
                                        <li>Sisa Stok: {{ $data->stok }}</li>
                                        <li>Nama Penerbit: {{ $data->nama }}</li>
                                    </ul>
                                    </p>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <tr>
                    <td> <strong>{{ $no++ }}</strong></td>
                    <td>{{ $data->nama_buku }}</td>
                    <td>{{ $data->nama_buku }}</td>
                    <td>{{ $data->stok }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('buku.edit', $data->id) }}"><i
                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                <button type="button" class="btn btn-primary">
                                    detail
                                </button>
                                <button class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="{{ '#id' . $data->id }}"><i
                                        class="bx bx-pencil me-1"></i>Detail</button>
                                <form action="{{ route('buku.destroy', $data->id) }}" method="GET">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="dropdown-item"
                                        onclick="return confirm('Are you sure??')"><i class="bx bx-trash me-1"></i>
                                        Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
@endsection
