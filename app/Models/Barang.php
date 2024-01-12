<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'deskripsi', 'harga'];

    // dalam file app/Models/Barang.php
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}