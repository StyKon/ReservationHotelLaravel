<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;

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
    $villes = DB::table('villes')->get();
    $categorys = DB::table('categories')->get();
    return view('User/welcome',compact('villes','categorys'));
})->name("welcome");


Route::get('/LogoutAdmin',function() {
    Auth::logout();
        Session::flush();
    return redirect ('login1');
    });
    Route::get('/LogoutClient',function() {
        Auth::logout();
            Session::flush();
            return redirect()->route('welcome');
        });

Route::post('/login', 'Controller@ClientLogin')->name("ClientLogin");

Route::get('/login', 'Controller@ShowClientLogin')->name("login");

Route::get('/login1', 'Controller@ShowAdminLogin')->name("login1");


Route::get('/search', 'Controller@search')->name("search");
Route::post('/search', 'Controller@search')->name("search");

Route::post('/login1', 'Controller@AdminLogin')->name("AdminLogin");
Route::get('/inscription', 'Controller@ShowClientLoginins');
Route::post('/inscription', 'ClientController@store')->name("store");

Route::group(['middleware' => 'CheckClient'], function (){

    Route::post('/reservation', 'Controller@reservation')->name("reservation");
    Route::get('/reservation', 'Controller@reservation')->name("reservation");

    Route::get('/myreservation', 'Controller@myreservation')->name("myreservation");
    Route::post('/myreservation', 'Controller@myreservation')->name("myreservation");

    Route::delete('/annulerreservation/{Id_Reservation}/{Id_Chambre}', 'Controller@annulerreservation')->name("annulerreservation");



});

Route::group(['middleware' => 'CheckAdmin'], function (){

    Route::resource('Admin/Category', CategoryController::class);
    Route::resource('Admin/Chambre', ChambreController::class);
    Route::resource('Admin/Hotel', HotelController::class);
    Route::resource('Admin/Image', ImageController::class);
    Route::resource('Admin/Promotion', PromotionController::class);
    Route::resource('Admin/Ville', VilleController::class);
});


