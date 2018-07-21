<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Flight;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogPost;

class DemoController extends Controller
{
    public function queryBuilder(){
    	// $data = \DB::table('flights')->get();
    	// dd($data);
    	$product = DB::table('flights')->where('flight_id',2)->get();
    	dd($product);


    }
    public function eloquent()
    {
    	$products = Flight::where('name','USA')->first();
    	dd($products);
    }
    public function testSession(){
    	// dang loi chua chay dc
    	Session::put('user','Thong tin user');

    	$ss = Session::get('user');
    	var_dump($ss);
    }

    

    public function uploadFile(Request $request){
    	// Thông báo khi xảy ra lỗi
        $messages = [
            'image' => 'Định dạng không cho phép',
            'max' => 'Kích thước file quá lớn',
        ];
        // Điều kiện cho phép upload
        $rules = [
		    'file' => 'image|max:2028',
		]; 
		$validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
        	echo '<h1>Error ........................</h1>';
            
        }else{
        	echo '<h1>OK..............................</h1>';
        }

    }

    public function googleMarker(){
        
        return view('demo.marker');
    }
    
    
}
