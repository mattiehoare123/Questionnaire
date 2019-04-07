<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create A Question');

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
$I->seeCurrentUrlEquals('/question/9/create');
$I->see('Add New Question');

//Then
$I->submitForm('#createQuestion', [
  'question' => 'testquestion',
  'required' =>  true
]);

//And
$I->seeCurrentUrlEquals('/choice/3/create');
