@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-group mb-2">
        <a href="{{url('master-items')}}" class="btn btn-secondary">Kembali ke Daftar Item</a>
    </div>
    <div class="card mb-4">
        <div class="card-header">Filter Kategori</div>
        <div class="card-body">
            <form action="{{ url('kategori-items') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Filter Nama..." value="{{ request('nama_kategori') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="kode_kategori" class="form-control" placeholder="Filter Kode..." value="{{ request('kode_kategori') }}">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Cari</button>
                    <a href="{{ url('kategori-items') }}" class="btn btn-secondary">Reset</a>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <span>Daftar Kategori</span>
            <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalTambah">Tambah Kategori</button>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td>{{ $row->kode_kategori }}</td>
                        <td>{{ $row->nama_kategori }}</td>
                        <td>
                            <a href="{{ url('kategori-items/'.$row->id) }}" class="btn btn-info btn-sm">View Detail</a>
                            <a href="{{ url('kategori-items/delete/'.$row->id) }}" 
                                class="btn btn-danger btn-sm" 
                                onclick="return confirm('Yakin ingin menghapus kategori ini? Item yang terkait tidak akan terhapus, hanya relasinya saja.')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="modalTambah" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ url('kategori-items') }}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header"><h5>Tambah Kategori</h5></div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Kode Kategori</label>
                    <input type="text" name="kode_kategori" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection