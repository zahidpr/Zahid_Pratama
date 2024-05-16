<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataLaundry extends Model
{
    use HasFactory;
    protected $table = 'datalaundry';

    protected $fillable = [
        'datalaundry',
    ];

}