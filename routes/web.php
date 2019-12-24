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

Route::get('/' , function() {
	return view('welcome');
});
// when user visits /todos the function (index) inside TososController is called
Route::get('/todos','TodosController@index');
// dynamic routing when user route to /todos/1 for example  show function is called taking todosID as parameter
Route::get('/todos/{todosID}','TodosController@show');
// when user visits /todos/new-todo the function (create) inside TososController is called
Route::get('/new-todo','TodosController@create');
// use "POST" because its a post request !
Route::post('/create-todo','TodosController@store');
// dynamic routing when user route to /todos/edit 1 for example  edit function is called taking todosID as parameter
// NOTE HERE WE ARE USING ROUTE MODEL BINDING CHECK EDIT METHOD TO KNOW MORE !
Route::get('/todos/edit/{todo}','TodosController@edit');
// use "POST" because its a post request !
Route::post('/update-todo/{todosID}','TodosController@update');
// use "POST" because its a post request !
Route::post('/delete-todo/{todosID}','TodosController@destory');
// use "POST" because its a post request !
Route::post('/complete-todo/{todosID}','TodosController@complete');