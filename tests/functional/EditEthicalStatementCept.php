<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Update The Questionnaire Title');

Auth::loginUsingId(2);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '999',
  'user_id' => '2',
  'title' => 'Food Review',
  'ethical' => 'Ethical Statmenet',
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
$I->fillField('ethical', 'Edit ethical statement');

//Then
$I->click('Update');
//And
$I->seeCurrentUrlEquals('/questionnaire/999/index');
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '999', 'ethical' => 'Edit ethical statement']);
