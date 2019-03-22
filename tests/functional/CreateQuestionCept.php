<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create A Question');

//Add A Test User
$I->haveRecord('users', [
  'id' => '1',
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
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);
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
$I->seeCurrentUrlEquals('/question');
$I->click('Add New Question');

//Then
$I->seeCurrentUrlEquals('/questionnaire/question/create');
$I->submitForm('#createQuestion', [
  'question' => 'testquestion',
]);
//And
$I->seeCurrentUrlEquals('/questionnaire/question');
$I->see('textquestion');
