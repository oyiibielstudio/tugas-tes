@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-tachometer-alt text-primary mr-2"></i>Dashboard Ringkasan</h1>
    </div>

    <!-- Summary Cards Row -->
    <div class="row">

        <!-- Card Total Buku -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Koleksi Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBooks }} Judul</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Total Kategori -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Kategori</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalCategories }} Kategori</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Total User -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengguna Terdaftar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUsers }} User</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabel Buku Terbaru -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Buku Terbaru Ditambahkan</h6>
            <a href="{{ route('books.index') }}" class="btn btn-sm btn-primary">Lihat Semua Buku</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th>Judul Buku</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentBooks as $book)
                            <tr>
                                <td class="font-weight-bold text-gray-800">{{ $book->title ?? $book->name }}</td>
                                <td>
                                    <span class="badge badge-info">{{ $book->category->name ?? 'Tanpa Kategori' }}</span>
                                </td>
                                <td>{{ $book->author ?? '-' }}</td>
                                <td><span class="badge badge-success">{{ $book->stock }} unit</span></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">Belum ada data buku.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection