<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataLaundry extends Model
{
    protected $fillable = [
        'member_id',
        'laundry_type',
        'order_date',
        'pickup_date',
        'return_date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}