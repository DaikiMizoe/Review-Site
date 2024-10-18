<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function reports(){
        $this->hasMany('App\Report');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function shops(){
        return $this->belongsTo('App\Shop');
    }
}
