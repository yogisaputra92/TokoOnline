<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'kategori';

    // Jika ingin menentukan kolom yang bisa diisi (opsional)
    // protected $fillable = ['nama_kategori'];

    // Menjaga agar kolom 'id' tidak bisa diisi secara massal
    protected $guarded = ['id'];
}
