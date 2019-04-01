<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create A Questionnaire');

Auth::loginUsingId(2);

//Add User into DB (Not sure if this is needed)
$I->haveRecord('users', [
  'id' => '999',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//Check user is in DB
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
