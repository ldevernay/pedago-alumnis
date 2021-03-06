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
})->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//security routes
Route::get('/goodboy', 'HomeController@goodboy')->name('goodboy')->middleware('role:formateur');
Route::get('/badboy', 'HomeController@badboy')->name('badboy');

//users routes
Route::get('/users', 'UsersController@index')->name('users');
Route::get('/users/{name}', 'UsersController@show')->name('users_show');
Route::get('/users/{id}/update', 'UsersController@update')->name('users_update');
Route::post('/users/store', 'UsersController@store')->name('users_store');

//contacts routes
Route::get('/contacts', 'ContactsController@index')->name('contacts');
Route::get('/users/{id}/addFriend', 'ContactsController@addFriend')->name('contacts_addFriend');
Route::get('/contacts/{id}/removeFriend', 'ContactsController@removeFriend')->name('contacts_removeFriend');
Route::get('/contacts/{id}', 'ContactsController@show')->name('contacts_show');
Route::post('/contacts/{id}/send_message', 'ContactsController@send_message')->name('send_message');
Route::get('/contacts/{id}/remove_message/{message_id}', 'ContactsController@remove_message')->name('remove_message');

//events routes
Route::get('/events', 'EventsController@index')->name('events');
Route::get('/events/create', 'EventsController@create')->name('events_create');
Route::post('/events/store', 'EventsController@store')->name('events_store');
Route::get('/events/{id}', 'EventsController@show')->name('events_show');
Route::get('/events/{id}/delete', 'EventsController@delete')->name('events_delete');
Route::get('/events/{id}/subscribe', 'EventsController@subscribe')->name('events_subscribe');
Route::get('/events/{id}/unsubscribe', 'EventsController@unsubscribe')->name('events_unsubscribe');
Route::get('/events/{id}/update', 'EventsController@update')->name('events_update');
Route::post('/events/{id}/update_store', 'EventsController@storeUpdate')->name('events_storeupdate');

//jobs routes
Route::get('/annonces', 'JobsController@index')->name('annonces');
Route::get('/annonces/create', 'JobsController@create')->name('annonces_create');
Route::post('/annonces/storejob', 'JobsController@storejob')->name('annonces_storejob');
Route::get('/annonces/{id}', 'JobsController@show')->name('annonces_show');
Route::get('/annonces/{id}/update', 'JobsController@update')->name('annonces_update');
Route::get('/annonces/{id}/delete', 'JobsController@delete')->name('annonces_delete');
Route::post('/annonces/{id}/storeupdate', 'JobsController@storeUpdate')->name('annonces_storeupdate');
Route::post('/annonces/filter','JobsController@filter')->name('annonces_filter');
