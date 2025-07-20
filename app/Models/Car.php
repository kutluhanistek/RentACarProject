<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';
    public function getPrice(){
        return $this->hasOne('App\Models\Price','arac_id','id');
    }
    use HasFactory;
}
