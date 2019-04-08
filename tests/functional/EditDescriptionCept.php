<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Edit The Title');

Auth::loginUsingId(2);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '999',
  'user_id' => '2',
  'title' => 'Food Review',
  'description' => 'Questionnaire About Food',
]);

//Check the user and questionnaire are in the DB
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '999']);

//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/index');
//And
//$I->see('Edit - Food Review');
//And
$I->click('Edit Title');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/edit');
//And
$I->see('Edit - Food Review Welcome Page');
//Then
$I->fillField('description', 'editDescription');
//And
$I->click('Update');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/index');
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '999', 'description' => 'editDescription']);
