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

Route::get('/', 'PagesController@home');

Route::get('messages/{id}', 'MessagesController@show');

Route::post('messages/create', 'MessagesController@create');
// ->middleware('auth');

Auth::routes();
Route::get('/auth/facebook', 'SocialAuthController@facebook');
Route::get('/auth/facebook/callback', 'SocialAuthController@callback');
Route::get('/auth/facebook/register', 'SocialAuthController@register');



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/messages', 'MessagesController@search');

Route::get('/{username}', 'UsersController@show');

Route::get('/{username}/follows', 'UsersController@follows');
Route::get('/{username}/followers', 'UsersController@followers');


Route::get('/api/messages/{message}/responses','MessagesController@responses');



Route::group(['middleware' => 'auth'], function(){
    Route::post('/{username}/dms', 'UsersController@sendPrivateMessage');

    Route::post('/{username}/follow', 'UsersController@follow');
    Route::post('/{username}/unfollow', 'UsersController@unfollow');
    Route::get('/conversations/{conversation}', 'UsersController@showConversation');
});

