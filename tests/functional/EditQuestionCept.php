<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Edit A Question');

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
  'description' => 'Questionnaire About Food';
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
$I->amOnPage('/questionnaire/dashboard/1');
$I->see('My Questionnaires');

//Then
$I->seeElement('a', ['title' => 'Food Review']);
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire/edit/100');
//And
$I->see('Edit - Food Review');

//Then
$I->seeElement('a', ['question' => 'testquestion']);
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire/question/edit/111');
//And
$I->see('Edit Question - testquestion');

//Then
$I->submitForm('.editQuestion', [
  'question'=>  null,
  'required' => '[Yes]',
]);
//And
$I->expectTo('See the error message question is required');
$I->see('The question field is required');
//Then
$I->submitForm('.editQuestion', [
  'question'=>  'editquestion',
  'required' => '[Yes]',
]);
//Then
$I->seeCurrentUrlEquals('questionnaire/edit/100');
$I->seeRecord('question', ['question' => 'editquestion']);
$I->see('editquestion');
