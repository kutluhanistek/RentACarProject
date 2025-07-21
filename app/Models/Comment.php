<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    public function getComment(){
        return $this->hasOne('App\Models\User','id','musteri_id');
    }
    use HasFactory;
}
