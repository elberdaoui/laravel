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
    return view('/login');
});
Route::get ('password/lost','ForgotPasswordController@forgotPassword');

Auth::routes();
Route::get ('dashboard', 'DashboardController@index');
Route::get ('changepassword', 'UserController@changepassword');
Route::post('updatepassword','UserController@updatePassword');
Route::get ('profile', 'UserController@profile');
Route::resource ('pages', 'PagesController');
Route::resource ('bricoler', 'BricoleurController');
Route::post ('update/{user_id}', 'UserController@updateprofile');
Route::post('changePassword/{user_id}','UserController@updatePassword')->name('changePassword');
Route::get ('user/profile', 'UserController@profile');
Route::get ('main/logout', 'MainController@logout');
Auth::routes();
Auth::routes(['verify' => true]);
Route::get('profile', function () {
    // Only verified users may enter...
})->middleware('verified');
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/userCreate','UserController@create')->name('create_user');
Route::post('/userstore','userController@store')->name('store_user');

Route::get('/listUsers','UserController@listusers')->name('list_users');
Route::get('/userEdit/{id}','UserController@userEdit');
Route::post('/userUpdate/{id}','UserController@userUpdate');
Route::delete('/userDestroy/{id}','UserController@userDestroy');

//create route for sector
Route::get('/secteurCreate','secteurController@create')->name('create_sector');
Route::post('/sectorstore','secteurController@store')->name('store_sector');

Route::get('/listSectors','secteurController@listsectors')->name('list_sectors');
Route::get('/sectorEdit/{id}','secteurController@sectorEdit');
Route::post('/sectorUpdate/{id}','secteurController@sectorUpdate');

Route::delete('/sectorDestroy/{id}','secteurController@sectorDestroy');

//create route for ville
Route::get('/villeCreate','villeController@create')->name('create_ville');
Route::post('/villestore','villeController@store')->name('store_ville');

Route::get('/listVilles','villeController@listvilles')->name('list_villes');
Route::get('/villeEdit/{id}','villeController@villeEdit');
Route::post('/villeUpdate/{id}','villeController@villeUpdate');

Route::delete('/villeDestroy/{id}','villeController@villeDestroy');
