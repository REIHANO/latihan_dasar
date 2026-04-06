@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <h1>Daftar Produk Kami</h1>
    
    <div class="card">
        <div class="card-header">Daftar Produk</div>
        
        <div class="card-body">
            <div class="alert alert-primary">
                <b>Nama Toko: </b> {{ $dataToko['nama_toko'] }} <br>
                <b>Alamat: </b> {{ $dataToko['alamat'] }} <br>
                <b>Tipe Toko: </b> {{ $dataToko['type'] }}
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Berhasil!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between mb-3">
                <h3>List Data</h3>
                <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>
            </div>

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $item)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->nama_produk }}</td>
                        <td>0</td> 
                        <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td>
                            <a href="{{ route('produk.edit', $item->id_produk) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('produk.destroy', $item->id_produk) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection