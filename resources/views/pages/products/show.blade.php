@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1>Daftar Produk Kami</h1>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Daftar Produk</h3>
                </div>
                <div class="card-body">
                    <div class="alert alert-info shadow-sm">
                        <p class="mb-1"><strong>Nama Toko:</strong> {{ $dataStore['store_name'] }}</p>
                        <p class="mb-1"><strong>Alamat:</strong> {{ $dataStore['address'] }}</p>
                        <p class="mb-0"><strong>Tipe Toko:</strong> {{ $dataStore['type'] }}</p>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <h4>List Data</h4>
                        <a href="{{ route('product.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Produk
                        </a>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 50px">No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th style="width: 150px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td class="text-center">
                                    <span class="badge badge-success text-dark">
                                        {{ $item->category->category_name ?? 'Tanpa Kategori' }}
                                    </span>
                                </td>
                                <td>{{ $item->description }}</td>
                                <td class="text-center">{{ $item->stock }}</td>
                                <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus data?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger ml-1">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection