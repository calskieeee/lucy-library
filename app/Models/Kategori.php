<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $primaryKey = 'id_kategori';

    public $incrementing = false; // Menonaktifkan auto-incrementing karena primary key adalah string

    protected $keyType = 'string'; // Menentukan tipe data primary key sebagai string

    protected $fillable = ['id_kategori', 'nama_kategori'];

    public function bukus(): HasMany
    {
        return $this->hasMany(Buku::class, 'id_kategori');
    }
}
