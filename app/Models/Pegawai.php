<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    /**
     * Menentukan tabel yang digunakan oleh model ini.
     *
     * @var string
     */
    protected $table = 'pegawais'; // Tambahkan ini

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'posisi',
        'gaji',
    ];
}
