<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Edit The Title');

//Add A Test User
$I->haveRecord('users', [
  'id' => '1',
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
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);
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
//And
$I->see('Edit - Food Review Welcome Page');
//Then
$I->fillField('description', 'editDescription');
//And
$I->click('Update');

//Then
$I->seeCurrentUrlEquals('/questionnaire');
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '1', 'description' => 'editDescription']);
