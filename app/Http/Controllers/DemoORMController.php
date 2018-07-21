<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Bear;
use App\models\Fish;


class DemoORMController extends Controller
{
    public function getAllBears(){
    	$adobot = Bear::where('name', '=', 'Adobot')->first();
    	$fish = $adobot->fish;
    	return '<h1 style="font-size:500px; text-align:center">'.$fish->weight.'</h1>';

    }
}
