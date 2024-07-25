<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $primaryKey = 'id_buku';

    public $incrementing = false; // Menonaktifkan auto-incrementing karena primary key adalah string

    protected $keyType = 'string'; // Menentukan tipe data primary key sebagai string

    protected $fillable = ['id_buku', 'id_kategori', 'judul_buku', 'pengarang', 'penerbit', 'tahun_terbit'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
