<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cicles extends Model
{
    protected $table='cicles';
    protected $fillable=['id','name','img','deleted'];
}
