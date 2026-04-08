@extends('layouts.master')


@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">Tambah Data Produk</div>
        <div class="card-body">
            <form action="{{ route('product.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Produk</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>
    
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" class="form-control" value="{{ old('price') }}">
        @error('price') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Stok Produk</label>
        <input type="number" name="stock" class="form-control" value="{{ old('stock') }}">
        @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        @error('description') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Kategori Produk</label>
        <select name="category_id" class="form-control">
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $cat)
                {{-- Pastikan pakai $cat->id jika primary key di tabel kategori adalah 'id' --}}
                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
            @endforeach
        </select>
        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan Produk</button>
</form>
        </div>
    </div>
</div>
@endsection


