<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Edit The Questionnaire Description');

//Add A Test User
$I->haveRecord('users', [
  'id' => '1',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//Add A Questionnaire
$I->haveRecord('questionnaire', [
  'id' => '100',
  'user_id' => '1',
  'title' => 'Food Review',
  'description' => 'Questionnaire About Food';
]);

//Check the user and questionnaire are in the DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);
$I->seeRecord('questionnaire', ['title' => 'Food Review', 'id' => '100']);

//When
$I->amOnPage('/questionnaire/dashboard/1');
$I->see('My Questionnaires');

//Then
$I->seeElement('a', ['title' => 'Food Review']);
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire/edit/100');
$I->see('Edit - Food Review');
$I->dontSee('testquestion');
//And
$I->click('Add Question');

//Then
$I->submitForm('.createQuestion', [
  'question' => 'testquestion',
  'required' => '[Yes]', //Dropdown

]);
//And
$I->seeCurrentUrlEquals('/questionnaire/edit/100');
$I->see('textquestion');
