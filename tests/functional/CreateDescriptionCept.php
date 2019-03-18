<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create The Questionnaire Description');

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
  'description' => null;
]);

$I->seeRecord('questionnaire', ['title' => 'Food Review', 'id' => '100']);

//When
$I->amOnPage('/questionnaire/dashboard');
$I->see('My Questionnaires');

//Then
$I->seeElement('a', ['title' => 'Food Review']);
$I->click('Edit');

//When
$I->am('/questionnaire/100/edit');
$I->see('Edit');
$I->see('Food Review');

//Then
$I->submitForm('.createTitle_Description', [
  'title' => 'Food Review',
  'description' => 'Questionnaire About Food'
]);
//And
$I->click('Submit');

//Then
$I->see('Food Review', 'h1');
$I->see('Questionnaire About Food');
