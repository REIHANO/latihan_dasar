@extends('layouts.master')
@extends('layouts.footer')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <strong>Edit Data Produk: {{ $produk->nama_produk }}</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id_produk) }}" method="POST">
                @csrf
                @method('PUT') {{-- WAJIB: Agar Laravel tahu ini proses Update --}}

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}">
                    @error('nama_produk') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{ $produk->harga }}">
                    @error('harga') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi_produk" class="form-control" rows="3">{{ $produk->deskripsi_produk }}</textarea>
                    @error('deskripsi_produk') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3">
    <label class="form-label">Stok Produk</label>
    <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok) }}">
    @error('stok') <small class="text-danger">{{ $message }}</small> @enderror
</div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">Update Produk</button>
                    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection