@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="mb-3">
                <a href="{{ url('kategori-items') }}" class="btn btn-secondary">Kembali ke Daftar Kategori</a>
                <a href="{{ url('kategori-items/'.$kategori->id.'/export-pdf') }}" class="btn btn-danger">Download PDF</a>
            </div>
            
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detail Kategori: {{ $kategori->nama_kategori }}</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <strong>Kode Kategori:</strong>
                            <p class="text-muted">{{ $kategori->kode_kategori }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong>Nama Kategori:</strong>
                            <p class="text-muted">{{ $kategori->nama_kategori }}</p>
                        </div>
                    </div>

                    <hr>
                    <h5 class="mt-4 mb-3">List Item dengan Kategori Ini</h5>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Kode Item</th>
                                    <th>Nama Item</th>
                                    <th>Jenis</th>
                                    <th>Supplier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($kategori->masterItems as $m_item)
                                <tr>
                                    <td>{{ $m_item->kode }}</td>
                                    <td>{{ $m_item->nama }}</td>
                                    <td>{{ $m_item->jenis }}</td>
                                    <td>{{ $m_item->supplier }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada item untuk kategori ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection