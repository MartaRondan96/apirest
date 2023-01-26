<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    protected $table='offers';
    protected $fillable=['id','title','description','date_max','cicle_id','num_candidates','deleted'];
}
