<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Edit A Choice');

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
  'question' => 'testquestion',
  'required' => 'Yes',
]);

//Add Choices To The Question
$I->haveRecord('choice', [
  'id' => '101',
  'question_id' => '111',
  'choice' => 'deleteChoice',
]);

//Check The Record
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);
$I->seeRecord('questionnaire', ['title' => 'Food Review', 'id' => '100']);
$I->seeRecord('question', ['question' => 'testquestion', 'id' => '111', 'questionnaire_id' => '100']);
$I->seeRecord('choice', ['choice' => 'deleteChoice', 'id' => '102', 'question_id' => '111']);

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
$I->amOnPage('/questionnaire/question/edit/111');
//And
$I->see('Edit Question - testquestion');

//Then
$I->seeElement('a', ['choice' => 'deleteChoice']);
//And
$I->click('Delete');

//Then
$I->seeCurrentUrlEquals('questionnaire/question/edit/111');
$I->dontSeeElement('a', ['choice' => 'deleteChoice']);
