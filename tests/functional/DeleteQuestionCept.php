<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Delete A Question');

Auth::loginUsingId(2);

//Add A Test User
$I->haveRecord('users', [
  'id' => '999',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '1',
  'title' => 'Food Review',
  'description' => 'Questionnaire About Food',
]);

$I->haveRecord('questions', [
  'id' => '111',
  'questionnaires_id' => '100',
  'question' => 'testquestion',
]);

//Check the user and questionnaire are in the DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '999']);
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '1']);
$I->seeRecord('questions', ['question' => 'testquestion', 'id' => '111', 'questionnaires_id' => '100']);


//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire');
//And
//$I->see('Edit - Food Review');

//Then
$I->see('testquestion');
//And
$I->click('Delete');

//Then
$I->seeCurrentUrlEquals('/questionnaire');
//And
$I->dontSee('testquestion');
