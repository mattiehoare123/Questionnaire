<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create A Questionnaire Title');

//Add User into DB (Not sure if this is needed)
$I->haveRecord('users', [
  'id' => '1',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//Check user is in DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);

//When
$I->amOnPage('/questionnaire/dashboard/1');
$I->see('My Questionnaires');
$I->dontsee('Food Review');
//And
$I->click('Create Questionnaire');

//Then
$I->seeCurrentUrlEquals('~/questionnaire/welcome/create/(\d+)~');
//And
$I->see('New Questionnaire');
$I->submitForm('.createWelcomePage', [
  'title' => 'Food Review',
]);
//Then
$I->seeCurrentUrlEquals('~/questionnaire/create/(\d+)~');
$I->see('New Questionnaire - Food Review');

//Then
$I->amOnPage('/questionnaire/dashboard/1');
$I->see('Food Review');
