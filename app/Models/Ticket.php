<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'tickets';
    public function getUser(){
        return $this->hasOne('App\Models\User','id','musteri_id');
    }

    use HasFactory;
}
