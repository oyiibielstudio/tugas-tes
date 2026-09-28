@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kategori Baru</h1>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary btn-sm shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50 mr-1"></i> Kembali
        </a>
    </div>

    <div class="form-group">
    <label class="font-weight-bold">Kategori Buku <span class="text-danger">*</span></label>
    <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>

    <div class="card shadow mb-4 col-lg-8 p-0">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Kategori</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold">Nama Kategori <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Contoh: Pemrograman, Novel, Sains">
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="4" placeholder="Keterangan singkat kategori...">{{ old('description') }}</textarea>
                </div>
                <hr>
                <button type="submit" class="btn btn-success shadow-sm"><i class="fas fa-save mr-1"></i> Simpan Kategori</button>
                <a href="{{ route('categories.index') }}" class="btn btn-secondary shadow-sm">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection