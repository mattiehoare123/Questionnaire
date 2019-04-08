<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Edit A Questionnaire');

Auth::loginUsingId(2);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '999',
  'user_id' => '2',
  'title' => 'Food Review',
  'ethical' => 'Ethical Statmenet',
  'description' => 'Questionnaire About Food',
]);

//Check the user and questionnaire are in the DB
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '999']);

//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/index');
