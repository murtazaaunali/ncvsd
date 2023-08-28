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

/*Route::get('/', function () {
    return view('welcome');
});*/

 
Route::get('/', 'HomeController@index');
Route::get('/veteran-registration', 'Frontend\Veteran@index');
Route::post('/veteran-registration/submitvetaran', 'Frontend\Veteran@submitvetaran');
Route::get('/veteran-registration/thanks', 'Frontend\Veteran@thanksvetaran');
Route::get('/veteran/downloadpdf/{id}', 'Frontend\Veteran@downloadpdf')->middleware('auth');
// Email related routes
Route::get('mail/send', 'Frontend\Veteran@send');

Route::get('/volunteer-registration', 'Frontend\Volunteer@index');
Route::post('/volunteer-registration/submitvolunteer', 'Frontend\Volunteer@submitvolunteer');
Route::get('/volunteer-registration/thanks', 'Frontend\Volunteer@thanksvolunteer');
Route::get('/volunteer/downloadpdf/{id}', 'Frontend\Volunteer@downloadpdf')->middleware('auth');
Route::get('/volunteer/checkemail/', 'Frontend\Volunteer@checkemail')->name('checkemail');
Route::get('/importdata', 'Frontend\Volunteer@importdata');

//LOGOUT ROUTE
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


//ADMIN
Route::get('/dashboard/veterans', 'VeteransController@index')->middleware('auth');
Route::get('/veteranlist', 'VeteransController@veteranlist')->name('veteranlist')->middleware('auth');//->middleware('auth');
Route::get('/dashboard/veteranview/{id}', 'VeteransController@veteranview')->middleware('auth');//->middleware('auth');

Route::get('/dashboard/volunteers', 'VolunteersController@index')->name('volute')->middleware('auth');
Route::get('/volunteerlist', 'VolunteersController@volunteerlist')->name('volunteerlist')->middleware('auth');
Route::get('/dashboard/volunteerview/{id}', 'VolunteersController@volunteerview')->middleware('auth');


Route::get('/dashboard/userslist', 'UsersConrtoller@index')->middleware('auth');
Route::get('/dashboard/users-list', 'UsersConrtoller@userslist')->name('userslist')->middleware('auth');
Route::get('/dashboard/adduser', 'UsersConrtoller@adduser')->middleware('auth');
Route::get('/dashboard/edituser/{id}', 'UsersConrtoller@edituser')->name('edituser')->middleware('auth');
Route::post('/dashboard/updateuser', 'UsersConrtoller@updateuser')->name('updateuser')->middleware('auth');
Route::post('/dashboard/createuser', 'UsersConrtoller@createuser')->name('createuser')->middleware('auth');
Route::get('/dashboard/deleteuser/{id}', 'UsersConrtoller@deleteuser')->middleware('auth');


Route::get('/dashboard/configuration', 'ConfigurationController@index')->middleware('auth');
Route::post('/dashboard/updateconfiguration', 'ConfigurationController@updateconfiguration')->name('updateconfiguraiton')->middleware('auth');

//edit veteran registration submitted form
Route::get('/dashboard/editveteran/{id}', 'VeteransController@editveteran')->name('editveteran')->middleware('auth');
Route::post('/dashboard/updateveteran', 'VeteransController@updateveteran')->name('updateveteran')->middleware('auth');
Route::get('/dashboard/deleteveteran/{id}', 'VeteransController@deleteveteran')->middleware('auth');


//edit volunteer registration submitted form
Route::get('/dashboard/editvolunteer/{id}', 'VolunteersController@editvolunteer')->name('editvolunteer')->middleware('auth');
Route::post('/dashboard/updatevolunteer', 'VolunteersController@updatevolunteer')->name('updatevolunteer')->middleware('auth');
Route::get('/dashboard/deletevolunteer/{id}', 'VolunteersController@deletevolunteer')->middleware('auth');

//ADMIN


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboardgraphs');
//Route::get('/dashboard', 'DashboardController@militaryStatistisc');

Route::get('/generate/volunteer-csv', 'DashboardController@generate')->name('generategrphs');
Route::get('/generate/health', 'DashboardController@health')->name('health');
Route::get('/generate/veterens-csv', 'DashboardController@generate2')->name('generategrphs2');