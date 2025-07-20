<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';
    protected $fillable = [
        'arac_id', // EKLE
        'daily_price',
        'weekly_price',
        'daily_km_limit'
    ];

    use HasFactory;
}
