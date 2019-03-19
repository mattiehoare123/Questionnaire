<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Edit A Questionnaire');

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
$I->amOnPage('/questionnaire/edit/100');
//And
$I->see('Edit - Food Review');
