<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create A Choice');

Auth::loginUsingId(2);

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
$I->seeCurrentUrlEquals('/question/4/create');

$I->submitForm('#createQuestion', [
  'question' => 'testquestion',
]);
//And
$I->amOnPage('/choice/3/create');
//Then
$I->see('Add Choices');

$I->submitForm('#createChoice', [
  'choice' => 'choice1',
  'choice' => 'choice2',
]);

//And
$I->seeCurrentUrlEquals('/questionnaire');
