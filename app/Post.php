<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $table = 'post';
	public $timestamps = false;
    //
    public function comments(){
    	return $this->hasMany('App\Comment');
    }
}
