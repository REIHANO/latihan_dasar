<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $table = 'produk';

    protected $primaryKey = 'id_produk';

   // protected $fillable = ['nama_produk', 'harga', 'stok'];

    protected $guarded = ['id_produk'];

 }
