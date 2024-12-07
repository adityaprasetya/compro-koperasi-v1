<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPromosi extends Model
{
    use HasFactory;

    protected $table = 'promosi';

    protected $fillable = [
        'image', 
    ];

}