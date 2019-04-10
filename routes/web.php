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
/**
*A group created to then run the validation middleware and also the run the
*auth meaning the routes that are in this group require an account to access
*/
Route::group(['middle' => ['web']], function() {
  Auth::routes();
  /*
  * When using resource it does not allow for the create method to take an id as a parameter
  * so therefore i used get instead, which will expect an id passing to it from the store method and
  * then it will pass it to the create method in another controller
  */
  Route::get('question/{id}/create', 'QuestionController@create');
  Route::get('choice/{id}/create', 'ChoiceController@create');
  /**
   * The index also does not allow an $id as parameter and due the show method already taken to take the questionnaire
   * i have used the index to display the title, question and choices for editing
   */
  Route::get('questionnaire/{id}/index', 'QuestionnaireController@index');
  /**
   * Instead of routing to every method in the controller i can use rescource
   * instead of get which handles this for me
   */
  //This is for the dashboard which contains a list of the users questionnaires
  Route::resource('dashboard', 'DashboardController');
  //This is for the questionnaire views
  Route::resource('questionnaire', 'QuestionnaireController');
  //This is for the questions views
  Route::resource('question', 'QuestionController');
  //This is for the choices views
  Route::resource('choice', 'ChoiceController');
  //This is for the responses view
  Route::resource('responses', 'ResponseController');
  //This is for the admin views
  Route::resource('admin/users', 'UserController');
});
