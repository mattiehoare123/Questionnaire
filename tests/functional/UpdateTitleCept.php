<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Update The Questionnaire Title');

Auth::loginUsingId(2);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '999',
  'user_id' => '2',
  'title' => 'Food Review',
  'ethical' => 'Ethical Statmenet',
  'description' => 'Questionnaire About Food',
]);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '3000',
  'user_id' => '2',
  'title' => 'Bad Review',
  'ethical' => 'Ethical Statmenet',
  'description' => 'Questionnaire About Food',
]);

//Check the user and questionnaire are in the DB
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '999']);
$I->seeRecord('questionnaires', ['title' => 'Bad Review', 'id' => '3000']);

//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/index');
//And
$I->see('Edit - Food Review');
$I->dontSee('Bad Review');
//And
$I->click('Edit Title');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/edit');
//Then
$I->fillField('title', null);
//And
$I->click('Update');

//Then
$I->expectTo('See the error message with title required');
$I->see('The Title field is required');
//Then
$I->fillField('title', 'testTitle');
//And
$I->click('Update');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/index');
$I->seeRecord('questionnaires', ['title' => 'testTitle']);
$I->see('testTitle');
