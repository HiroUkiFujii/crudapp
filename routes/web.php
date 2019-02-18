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
Route::prefix('members')->group(function(){

  Route::get('list','MembersController@index');

  Route::get('new', [
    'uses'=>'MembersController@new_index',
    'as' => 'member.new_index']);

  Route::patch('new',[
    'uses' => 'MembersController@new_confirm',
    'as' => 'member.new_confirm']);

  Route::post('new', [
    'uses' => 'MembersController@new_finish',
    'as' => 'member.new_finish']);

  Route::get('edit/{id}/',  [
    'uses' => 'MembersController@edit_index',
    'as' => 'member.edit_index']);

  Route::patch('edit/{id}',[
    'uses' => 'MembersController@edit_confirm',
    'as' => 'member.edit_confirm']);

  Route::post('edit/{id}', [
    'uses' => 'MembersController@edit_finish',
    'as' => 'member.new_finish']); //完了

  Route::get('delete/{id}','MembersController@delete' );

});

/*Route::get('/', 'MembersController@index');*/
