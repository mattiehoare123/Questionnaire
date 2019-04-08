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




//A group created to then run the validation middleware
Route::group(['middle' => ['web']], function() {
  Auth::routes();
  /*
  * When using resource it does not allow for the create method to take an id as a parameter
  * so therefore i used get instead, which will expect an id passing to it from the store method and
  * then it will pass it to the create method in another controller
  */
  Route::get('question/{id}/create', 'QuestionController@create');
  Route::get('choice/{id}/create', 'ChoiceController@create');
  Route::get('questionnaire/{id}/index', 'QuestionnaireController@index');
  Route::resource('dashboard', 'DashboardController');
  Route::resource('questionnaire', 'QuestionnaireController');
  Route::resource('question', 'QuestionController');
  Route::resource('choice', 'ChoiceController');
  Route::resource('responses', 'ResponseController');
  Route::resource('admin/users', 'UserController');
});
