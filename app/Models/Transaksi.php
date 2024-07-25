<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis'; // Menggunakan nama tabel dalam huruf kecil

    protected $primaryKey = 'id_transaksi';

    public $incrementing = false; // Menonaktifkan auto-incrementing karena primary key adalah string

    protected $keyType = 'string'; // Menentukan tipe data primary key sebagai string

    protected $fillable = ['id_transaksi', 'id_buku', 'id_anggota', 'tanggal_meminjam', 'tanggal_mengembalikan', 'status_transaksi'];

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
    }

    public function anggota(): BelongsTo
    {
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id_anggota');
    }
}
