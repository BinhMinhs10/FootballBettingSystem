<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\models\Match;
use Illuminate\Support\Facades\Validator;
class AuthenController extends Controller
{
    public function checkUser(Request $request){
    	$matches = Match::all();
    	
		// $users = User::all();
        $data=[
            'username'=>$request->username,
            'password'=>$request->password,
        ];
        if(Auth::attempt($data)){
            return redirect('home')->with('success','You are successfully logged in')->with('matches',$matches);
        }else{
            return redirect('home')->with('fail', 'You have entered an invalid username or password')->with('matches',$matches);
        }
    }
    public function registerUser(Request $request){
        
        $validate = Validator::make($request->all(),[
            'username' => 'required|string|max:20|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'confirmpass' => 'required|same:password',
        ]);
        if($validate->fails()){
            return redirect('home')->withErrors($validate)->withInput();
        }else{
            $user = new User;
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            
            return redirect('home')->with('success','You sign up successfully');    
        }
        
    }

    public function formLogin(){
        // return view('admin.signin');
        return view('auth.login');
    }

    public function isValid(Request $request){
        $this->validate($request,[
            'username' => 'required',
            'password' => 'required',
        ]);
        $data=[
            'username'=>$request->username,
            'password'=>$request->password,
        ];
        if (Auth::guard('admin')->attempt($data)){
            $request->session()->put('islogin',"login");
            return redirect('matches');
        }else{
            return redirect('admin')->with('fail', 'You have entered an invalid username or password');
        }
    }
    public function doLogout(){
        Auth::guard('admin')->logout();
        return redirect('admin');
    }

    
}
