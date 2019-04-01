<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create A Choice');

Auth::loginUsingId(2);


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

//Check the user and questionnaire are in the DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '999']);
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '1']);

//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
//And
$I->click('Create Questionnaire');

//Then
$I->seeCurrentUrlEquals('/questionnaire/create');
//And
$I->see('New Questionnaire');
$I->submitForm('#createTitle', [
  'title' => 'Food Review',
]);

//Then
$I->seeCurrentUrlEquals('/question/create');

$I->submitForm('#createQuestion', [
  'question' => 'testquestion',
]);
//And
$I->amOnPage('/choice/create');
//Then
$I->see('Add Choices');
$I->submitForm('#createChoice', [
  'choice' => 'choice1',
  'choice' => 'choice2',
]);
