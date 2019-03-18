<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create a question');

//Add a questionnaire to the DB
$I->haveRecord('users', [
  'id' => '1',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//When
$I->amOnPage('/questionnaire/dashboard');
$I->see('My Questionnaires');
//And
$I->click('Create Questionnaire');

//Then
$I->amOnPage('/questionnaire/create');
//And
$I->see('Create Questionnaire');
$I->click('Add Question');

//Then
$I->submitForm('.createQuestion', [
  'question'=> 'testquestion',
]);

//And
$I->see('Test Question');
