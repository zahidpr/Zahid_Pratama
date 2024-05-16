<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membar extends Model
{
    use HasFactory;

    protected $table = 'member';

    protected $fillable = [
        'nama_membar',
        'password',
        'alamat,',
        'no_hp',
        'tgl_jain',
    ];

    
    
}