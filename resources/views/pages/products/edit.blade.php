@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-warning text-dark">
            <strong>Edit Data Produk: {{ $product->name }}</strong>
        </div>
        <div class="card-body">
            <form action="{{ route('product.update', $product->product_id) }}" method="POST">
                @csrf
                @method('PUT') 

                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                    @error('price') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Stok Produk</label>
                    <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
                    @error('stock') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                    @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                 <label>Kategori Produk</label>
    <select name="category_id" class="form-control">
        @foreach($categories as $cat)
            <option value="{{ $cat->category_id }}" 
                {{ $product->category_id == $cat->category_id ? 'selected' : '' }}>
                {{ $cat->category_name }}
            </option>
        @endforeach
    </select>
</div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-warning">Update Produk</button>
                    <a href="{{ route('product.index') }}" class="btn btn-secondary">Batal</a>
                </div>

                <div class="mb-3">
</div>

            </form>
        </div>
    </div>
</div>
@endsection