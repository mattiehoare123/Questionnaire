<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Delete A Question');

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
  'description' => "Thankyou for visting our resturant this is a questionnaire on how was your meal"
]);

//Add A Question
$I->haveRecord('question', [
  'id' => '111',
  'questionnaire_id' => '100',
  'question' => 'What was the best starter',
  'required' => 'Yes',
]);

//Check The Record
$I->seeRecord('questionnaire', ['title' => 'Food Review', 'id' => '100']);
$I->seeRecord('question', ['question' => 'What was the best starter', 'id' => '111', 'questionnaire_id' => '100']);

//When
$I->amOnPage('/questionnaire/dashboard');
$I->see('My Questionnaires');

//Then
$I->seeElement('a', ['title' => 'Food Review']);
$I->click('Delete');

//Then
$I->seeCurrentUrlEquals('/questionnaire/100/edit');

//And
$I->dontsee('What was the best starter');