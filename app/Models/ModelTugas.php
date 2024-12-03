<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelTugas extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan konvensi (tugas)
    protected $table = 'as_tugas';

    // Tentukan primary key jika berbeda dengan id
    protected $primaryKey = 'tugas_id';

    // Tentukan apakah primary key adalah auto increment
    public $incrementing = true;

    // Tentukan tipe data primary key
    protected $keyType = 'int';

    // Tentukan kolom yang dapat diisi secara mass-assignment
    protected $fillable = [
        'guru_id',
        'title',
        'description',
        'due_date',
    ];

    // Tentukan relasi jika ada (misalnya relasi dengan guru)
    public function guru()
    {
        return $this->belongsTo(ModelUser::class, 'guru_id', 'user_id');
    }
}
