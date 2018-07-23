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

use Yajra\DataTables\Facades\DataTables;

Route::get('/', function() {
    $model = App\User::query();

    return DataTables::of($model)->toJson();

});

Route::get('/users', function () {
    return view('users');
});

Route::get('/surveys', function () {
    return view('surveys');
});


Route::get('/getUsers', 'UtilityController@getUsers')->name('getUsers');

Route::post('/addSurvey', 'UtilityController@addSurvey')->name('addSurvey');

Route::get('/getSurveys', 'UtilityController@getSurveys')->name('getSurveys');

Route::post('/deleteSurvey','UtilityController@deleteSurvey')->name('deleteSurvey');
Route::post('/editSurvey','UtilityController@editSurvey')->name('editSurvey');

