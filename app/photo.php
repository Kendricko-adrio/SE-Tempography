<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    protected $table='photos';
    protected $fillable=['user_id','PhotoName','PhotoURL','PhotoDescription','PhotoPrice'];
}
