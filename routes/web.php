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
    return view('welcome');
});

/*Route::get('questionnaire/dashboard', function () {
   return view('questionnaire.dashboard');
});

*/
Route::resource('dashboard', 'DashboardController');
Route::resource('choice', 'ChoiceController');


//A group created to then run the validation middleware
Route::group(['middle' => ['web']], function() {
  Route::resource('questionnaire', 'QuestionnaireController');
  Route::resource('question', 'QuestionController');

});
