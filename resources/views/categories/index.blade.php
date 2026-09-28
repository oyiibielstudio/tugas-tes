@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-tags text-primary mr-2"></i>Kategori Buku</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50 mr-1"></i> Tambah Kategori
        </a>
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori Buku</h6>
            <span class="badge badge-primary px-3 py-2">Total: {{ $categories->total() }} Data</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th width="140">Jumlah Buku</th>
                            <th width="160" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $key => $category)
                            <tr>
                                <td>{{ $categories->firstItem() + $key }}</td>
                                <td class="font-weight-bold text-gray-800">{{ $category->name }}</td>
                                <td>{{ $category->description ?? 'Tidak ada deskripsi' }}</td>
                                <td><span class="badge badge-primary px-2 py-1">{{ $category->books_count }} Buku</span></td>
                                <td class="text-center">
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm shadow-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button onclick="return confirm('Menghapus kategori ini akan mengosongkan kategori buku terkait. Yakin?')" class="btn btn-danger btn-sm shadow-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">Belum Ada Kategori.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection