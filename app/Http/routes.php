<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('login', 'LoginController@index');

Route::post('login', 'LoginController@validateLogin');
Route::get('logout', 'LoginController@logout');

Route::get('verifikasiUKMIndag', 'VerifikasiUKMIndagController@index');
Route::post('verifikasiUKMIndag', 'VerifikasiUKMIndagController@validateNoReg');
Route::get('dashboardGuestMessages', 'HomeController@message');

Route::get('daftarUKMIndag', 'DaftarUKMIndagController@index');
Route::get('daftarUKM', 'DaftarUKMIndagController@ratingUKM');
Route::get('daftarIndustri', 'DaftarUKMIndagController@ratingIndustri');
Route::post('ratingUKM', 'DaftarUKMIndagController@beriRatingUKM');
Route::post('ratingIndustri', 'DaftarUKMIndagController@beriRatingIndustri');

Route::get('dashboardDinas', 'DashboardDinasController@index');
Route::get('CRUD_Dinas', 'CRUDPageController@index');

Route::get('createUKM', 'CreateController@ukm');
Route::get('createIndustri', 'CreateController@industri');
Route::post('createUKM', 'CreateController@createUKM');
Route::post('createIndustri', 'CreateController@createIndustri');

Route::get('deleteUKM', 'DeleteController@ukm');
Route::get('deleteIndustri', 'DeleteController@industri');
Route::get('deleteUKMQuery', 'DeleteController@deleteUKM');
Route::get('deleteIndustriQuery', 'DeleteController@deleteIndustri');

Route::get('updateUKM', 'UpdateController@updateUKMForm');
Route::get('updateIndustri', 'UpdateController@updateIndustriForm');
Route::get('updateVerifikasi', 'UpdateController@updateVerifikasiForm');
Route::post('updateUKM', 'UpdateController@updateUKM');
Route::post('updateIndustri', 'UpdateController@updateIndustri');
Route::post('updateVerifikasi', 'UpdateController@updateVerifikasi');
Route::get('listUKM', 'updateController@listUKM');
Route::get('listIndustri', 'updateController@listIndustri');
Route::get('listVerifikasi', 'updateController@listVerifikasi');

Route::get('updateUKMUKMIN', 'UpdateProfileController@index');
Route::get('updateIndustriUKMIN', 'UpdateProfileController@index');
Route::post('updateUKMUKMIN', 'UpdateProfileController@updateUKM');
Route::post('updateIndustriUKMIN', 'UpdateProfileController@updateIndustri');

Route::get('dashboardMessages', 'dashboardMessagesController@dinas');
Route::get('dashboardUKMINMessages', 'dashboardMessagesController@ukmin');

Route::get('graph', 'GraphController@index');
Route::post('create_graph', 'GraphController@create_graph');
Route::post('create_graph_dinas', 'GraphController@create_graph_dinas');
Route::get('create_graph',function(){
	return View::make('profitGrowth');
});
Route::get('profitGrowth',function(){
	return View::make('profitGrowth');
});
Route::post('profitGrowth','GraphController@add_profit');
Route::get('dashboardReport',function(){
	return View::make('dashboardReport');
});
Route::get('dashboardUKMIN', function()
{
	return View::make('dashboardUKMIN');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('search','SearchController@searchUKMAndIndustri');
