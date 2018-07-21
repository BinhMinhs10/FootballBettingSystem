<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    //
    protected $table = 'flights';
    protected $primaryKey = 'flight_id';
    // bang ko timestamp
    public $timestamps = false;
    const CREATED_AT = 'creation_dates';
    const UPDATED_AT = 'last_update';

    protected $guarded = ['price'];

    
}
