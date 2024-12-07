<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPembiayaan extends Model
{
    use HasFactory;

    protected $table = 'pembiayaan';

    protected $fillable = [
        'image', 
    ];

}