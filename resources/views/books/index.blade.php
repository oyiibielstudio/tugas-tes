@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-book text-primary mr-2"></i>Manajemen Buku</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Tambah Buku Baru
        </a>
    </div>

    <!-- Card Penjelasan Fungsi Modul (Memenuhi Syarat Tugas 2) -->
    <div class="card border-left-info shadow mb-4">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Informasi & Fungsi Modul</div>
                    <div class="h6 mb-0 text-gray-800">
                        Modul ini dirancang untuk mengelola data katalog pustaka digital. Anda dapat mencatat judul buku, nama penulis, jumlah stok ketersediaan, serta memberikan ringkasan deskripsi. Modul ini mendukung operasi penuh mulai dari penambahan data, pembaruan stok/informasi, hingga penghapusan entri.
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-info-circle fa-3x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Katalog Buku</h6>
            <span class="badge badge-primary px-3 py-2">Total: {{ $books->total() }} Data</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="50">No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th width="120">Stok</th>
                            <th>Deskripsi</th>
                            <th width="160" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $key => $book)
                            <tr>
                                <td>{{ $books->firstItem() + $key }}</td>
                                <td class="font-weight-bold text-gray-800">{{ $book->title }}</td>
                                <td><i class="fas fa-user-edit text-muted mr-1"></i> {{ $book->author }}</td>
                                <td><span class="badge badge-success px-2 py-1">{{ $book->stock }} unit</span></td>
                                <td>{{ Str::limit($book->description ?? 'Tidak ada deskripsi', 50) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('books.edit', $book) }}" class="btn btn-warning btn-sm shadow-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('books.destroy', $book) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Apakah Anda yakin ingin menghapus buku ini?')" class="btn btn-danger btn-sm shadow-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <!-- Condition Empty State -->
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="fas fa-folder-open fa-3x mb-3 d-block text-gray-400"></i>
                                    <h5>Belum Ada Data Buku</h5>
                                    <p class="mb-3">Katalog buku saat ini masih kosong. Silakan tambahkan data baru.</p>
                                    <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus mr-1"></i> Tambah Data Sekarang
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $books->links() }}
            </div>
        </div>
    </div>
</div>
@endsection