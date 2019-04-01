<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create An Ethical Statement');

Auth::loginUsingId(2);

//Add A Test User
$I->haveRecord('users', [
  'id' => '999',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//Check the user is in the DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '999']);

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
  'ethical' => 'test Ethical Statement',
]);
//Then
$I->seeCurrentUrlEquals('/question/create');
$I->see('Food Review');
