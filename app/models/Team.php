<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = array('name','nation','flag');
    public function math(){
    	return $this->belongsTo('App\models\Match');	
    }
    public function othermath(){
    	return $this->belongsTo('App\models\Match','awayteam_id');
    }
}
