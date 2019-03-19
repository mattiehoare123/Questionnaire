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
]);

//Check the user and quetionnaire are in the DB
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
$I->seeCurrentUrlEquals('~/questionnaire/edit/100')
$I->see('Edit - Food Review');
//Then
$I->seeElement('a', ['title' => 'Food Review']);
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('questionnaire/welcome/edit/100');
//And
$I->see('Edit Welcome Page');
//Then
$I->submitForm('.createWelcomePage', [
  'title' => null,
]);
//And
$I->expectTo('See the error message with title required');
$I->see('The Title field is required');
//Then
$I->submitForm('.createWelcomePage', [
  'title' => 'Food Review On McDonalds',
]);
//Then
$I->seeCurrentUrlEquals('/questionnaire/edit/100');
$I->seeRecord('questionnaire', ['title' => 'Food Review On McDonalds']);
$I->see('Edit - Food Review On McDonlads', 'h1');
