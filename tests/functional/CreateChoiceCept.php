<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create A Choice');

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
  'description' => 'Questionnaire About Food',
]);

//Add A Question
$I->haveRecord('question', [
  'id' => '111',
  'questionnaire_id' => '100',
  'question' => 'testquestion',
  'required' => 'Yes',
]);

//Check The Record
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);
$I->seeRecord('questionnaire', ['title' => 'Food Review', 'id' => '100']);
$I->seeRecord('question', ['question' => 'testquestion', 'id' => '111', 'questionnaire_id' => '100']);

//When
$I->seeCurrentUrlEquals('/questionnaire/dashboard/1');
$I->see('My Questionnaires');

//Then
$I->seeElement('a', ['title' => 'Food Review']);
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire/edit/100');
$I->see('Edit - Food Review');
$I->dontSee('testChoice');

//Then
$I->submitForm('.createChoice', [
  'choice' => 'testChoice,'
]);

//Then
$I->seeCurrentUrlEquals('/questionnaire/edit/100');
$I->see('testChoice');
