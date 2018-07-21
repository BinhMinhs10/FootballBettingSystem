<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = array('awayteam_id','team_id','tie','win','lost','timestop','timestart','timefinish','result','status');

    protected $table = 'matches';
    
    public function users(){
    	return $this->belongsToMany('App\User','matches_users','match_id','user_id')->withPivot('amountbet', 'choice');
    }
    public function team(){
    	return $this->hasOne('App\models\Team','id','team_id');
    }
    public function awayteam(){
    	return $this->hasOne('App\models\Team','id','awayteam_id');
    }
}
