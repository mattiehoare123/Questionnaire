<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Update The Questionnaire Title');

Auth::loginUsingId(2);

//Add A Test User
$I->haveRecord('users', [
  'id' => '999',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '1',
  'title' => 'Food Review',
  'description' => 'Questionnaire About Food',
]);

//Check the user and questionnaire are in the DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '999']);
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '1']);

//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire');
//And
//$I->see('Edit - Food Review');
//And
$I->click('Edit Title');

//Then
$I->seeCurrentUrlEquals('/questionnaire/1/edit');
//Then
$I->fillField('title', null);
//And
$I->click('Update');

//Then
$I->expectTo('See the error message with title required');
$I->see('The Title field is required');
//Then
$I->fillField('title', 'testTitle');
//And
$I->click('Update');

//Then
$I->seeCurrentUrlEquals('/questionnaire');
$I->seeRecord('questionnaires', ['title' => 'testTitle']);
$I->see('testTitle');
