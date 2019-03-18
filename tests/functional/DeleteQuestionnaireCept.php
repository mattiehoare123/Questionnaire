<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Delete a questionnaire');

//Add a questionnaire to the DB
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
  'description' => "Thankyou for visting our resturant this is a questionnaire on how was your meal"
]);

//Check The Data is in the DB
$I->seeRecord('questionnaire', ['title' => 'Food Review', 'id' => '100']);

//When
$I->amOnPage('/questionnaire/dashboard');
$I->see('My Questionnaires');

//Then
$I->seeElement('a', ['title' => 'Food Review']);
$I->click('Delete');

//Then
$I->amOnPage('/questionnaire/dashboard');
//And
$I->dontSeeElement('a', ['title' => 'Food Review']);
