<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSimulasi extends Model
{
    use HasFactory;

    protected $table = 'simulasi';

    protected $fillable = [
        'image', 
    ];

}