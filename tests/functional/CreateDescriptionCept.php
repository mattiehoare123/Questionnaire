<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create A Questionnaire Description');

//Add A Test User
$I->haveRecord('users', [
  'id' => '1',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//Check the user is in the DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);

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
  'description' => 'Questionnaire About Food',
]);
//Then
$I->seeCurrentUrlEquals('/question/create');
$I->see('New Questionnaire - Food Review');
$I->see('Questionnaire About Food');
