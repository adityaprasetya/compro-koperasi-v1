<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBlog extends Model
{
    use HasFactory;

    // Menentukan nama tabel, karena nama tabel secara default adalah bentuk jamak dari nama model
    protected $table = 'blog';

    // Menentukan kolom-kolom yang dapat diisi secara massal (mass-assignment)
    protected $fillable = [
        'title', 
        'content', 
        'author_id', 
        'status', 
        'image',
        'published_at',
    ];

    // Menentukan relasi dengan model User (author)
    public function author()
    {
        return $this->belongsTo(ModelUser::class, 'author_id');
    }

    // Menentukan apakah kolom timestamps digunakan secara otomatis
    public $timestamps = true;
}
