<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return view('home');    
});




// Football betting miniproject
// =========================================================================


Auth::routes();

Route::get('home', 'PagesController@getHome')->name('home');
Route::get('about', 'PagesController@getAbout')->name('about');
Route::get('contact', 'PagesController@getContact')->name('contact');
Route::get('history', 'PagesController@getHistory')->name('history');
Route::post('/contact/submit', 'PagesController@submit');
Route::post('betting', 'PagesController@doBet' )->name('betting');


Route::post('signin', 'AuthenController@checkUser')->name('signin');
Route::post('signup', 'AuthenController@registerUser')->name('signup');
Route::get('logout', function() {
    Auth::logout();
    return redirect('home');
})->name('logout');


Route::get('admin', 'AuthenController@formLogin')->name('admin');
Route::post('login', 'AuthenController@isValid')->name('login');
Route::get('adlogout', 'AuthenController@doLogout')->name('adlogout');


Route::get('detailMatch/{id}', 'PagesController@getDetail' );
Route::get('matches', 'PagesController@getMatches')->name('matches')->middleware('admin');
Route::prefix('matches')->group(function () {
    Route::post('add', 'PagesController@addMatch');
    Route::get('delete/{id}','PagesController@deleMatch');
    Route::get('public/{id}', 'PagesController@publicMatch');
    Route::get('edit/{id}', 'PagesController@editMatch');
    Route::post('save', 'PagesController@saveMatch');
    Route::get('view/{id}', 'PagesController@viewBetting');
    Route::post('addresult', 'PagesController@addResult')->name('addresult');
});


Route::get('teams', 'PagesController@getTeams')->name('teams')->middleware('admin');
Route::prefix('teams')->group(function () {
    Route::post('add', 'PagesController@doUpload');
    Route::get('delete/{id}','PagesController@deleTeam');
    Route::get('edit/{id}', 'PagesController@editTeam');
    Route::post('save', 'PagesController@saveTeam');
});

//===========================================================================



//where is defien regular expression
Route::get('user/{id}', function ($id) {
    return "<h1>".$id."</h1>";
})->where('id', '[0-9]+');





//===============================================================================

Route::get('flights', 'FlightController@display');

Route::get('flights/{id}', 'FlightController@getById');

Route::get('storeFlight', 'FlightController@store');

Route::get('editFlight/{id}', 'FlightController@edit');

Route::get('destroyFlight/{id}', 'FlightController@destroy');


//====================================================================================
// Demo query builder and eloquent
//
Route::get('demo-querybuilder','DemoController@queryBuilder');
Route::get('demo-eloquent','DemoController@eloquent');

Route::get('demo-middleware','DemoController@eloquent')->middleware('checkage');


Route::get('/show-upload', function(){
       return view('demo.form_upload');
});
Route::post('upload-file', 'DemoController@uploadFile');


//======================================================================================
// demo google maps API

Route::get('marker', 'DemoController@googleMarker');

// use App\Admin;
// Route::get('/createAdmin', function() {
//     Admin::create([
//         'username'=> 'admin',
//         'email'=> 'admin@gmail.com',
//         'password'=> bcrypt('altplus')
//     ]);
//     return view('welcome');
// });