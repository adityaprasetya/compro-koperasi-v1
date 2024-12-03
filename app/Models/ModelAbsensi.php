<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelAbsensi extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan konvensi (tugas)
    protected $table = 'as_absensi';

    // Tentukan primary key jika berbeda dengan id
    protected $primaryKey = 'absensi_id';

    // Tentukan apakah primary key adalah auto increment
    public $incrementing = true;

    // Tentukan tipe data primary key
    protected $keyType = 'int';

    // Tentukan kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'murid_id',
        'tanggal',
        'status',
    ];

    // Tentukan relasi jika ada (misalnya relasi dengan guru)
    public function guru()
    {
        return $this->belongsTo(ModelUser::class, 'guru_id', 'user_id');
    }
}
