<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Submit A Question');

//Add A Test User
$I->haveRecord('users', [
  'id' => '1',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//When
$I->amOnPage('/questionnaire/dashboard');
$I->see('My Questionnaires');
//And
$I->click('Create Questionnaire');

//Then
$I->amOnPage('/questionnaire/create');
//And
$I->see('Create Questionnaire');
$I->click('Add Question');

//Then
$I->submitForm('.createQuestion', [
  'question'=> 'testquestion',
]);
$I->submitForm('.createChoice', [
  'choice' => 'testChoice,'
]);

$I->see('Test Question');


//Check The Record
$I->seeRecord('questionnaire', ['title' => 'Food Review', 'id' => '100']);
$I->seeRecord('question', ['question' => 'What was the best starter', 'id' => '111', 'questionnaire_id' => '100']);

//When
$I->amOnPage('/questionnaire/dashboard');
$I->see('My Questionnaires');

//Then
$I->seeElement('a', ['title' => 'Food Review']);
$I->click('');

//Then
$I->amOnPage('/questionnaire/100/edit');
//And
$I->see('Edit - Food Review');
