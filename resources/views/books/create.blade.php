@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Buku Baru</h1>
        <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Kembali
        </a>
    </div>

    <div class="card shadow mb-4 col-lg-8 p-0">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Data Buku</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Judul Buku <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Judul buku...">
                    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Penulis <span class="text-danger">*</span></label>
                    <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" placeholder="Nama penulis...">
                    @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Jumlah Stok <span class="text-danger">*</span></label>
                    <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', 0) }}">
                    @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>
                <hr>
                <button type="submit" class="btn btn-success shadow-sm"><i class="fas fa-save mr-1"></i> Simpan Buku</button>
                <a href="{{ route('books.index') }}" class="btn btn-secondary shadow-sm">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection