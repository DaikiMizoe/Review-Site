<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }
    
    public function reviews(){
        return $this->hasMany('App\Review');
    }
}
