<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas'; // Nama tabel dalam huruf kecil

    protected $primaryKey = 'id_anggota';

    public $incrementing = false; // Menonaktifkan auto-incrementing karena primary key adalah string

    protected $keyType = 'string'; // Menentukan tipe data primary key sebagai string

    protected $fillable = ['id_anggota', 'nama_anggota', 'alamat', 'tanggal_daftar'];

    public function transaksis(): HasMany
    {
        return $this->hasMany(Transaksi::class, 'id_anggota', 'id_anggota');
    }
}
