<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    protected $fillable = array('match_id','amountbet','user_id','choice');

    protected $table = 'matches_users';
    
}
