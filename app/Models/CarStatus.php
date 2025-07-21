<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CarStatus extends Model
{
    protected $table = 'car_status';

    public function getCar(){
        return $this->hasOne('App\Models\Car','id','arac_id');
    }
    public function getUser(){
        return $this->hasOne('App\Models\User','id','musteri_id');
    }
    use HasFactory;
}
