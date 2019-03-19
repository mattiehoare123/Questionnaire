<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create An Ethical Statement');

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
$I->amOnPage('/questionnaire/dashboard/1');
$I->see('My Questionnaires');
//And
$I->click('Create Questionnaire');

//Then
$I->seeCurrentUrlEquals('~/questionnaire/welcome/create/(\d+)~');
//And
$I->see('New Questionnaire');
$I->submitForm('.createWelcomePage', [
  'title' => 'Food Review',
  'ethical' => 'test Ethical Statement',
]);
//Then
$I->seeCurrentUrlEquals('~/questionnaire/create/(\d+)~');
