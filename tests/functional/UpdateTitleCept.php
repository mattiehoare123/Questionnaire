<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Update The Questionnaire Title');

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
  'description' => "Thankyou for visting our resturant this is a questionnaire on how was your meal"
]);

//When
$I->am('/questionnaire/100/create');
$I->see('Edit');
$I->see('Food Review');
//And
$I->submitForm('.createTitle', [
  'title' => null;
]);
//Then
$I->expectTo('See the error message with title required');
$I->see('The Title field is required');
//Then
$I->submitForm('.createTitle', [
  'title' => 'Food Review'
]);
//Then
$I->click('Add Title');
$I->see('Food Review', 'h1');
