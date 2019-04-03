<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Submit A Questionnaire');

Auth::loginUsingId(2);

$I->haveRecord('questionnaires', [
  'id' => '1',
  'user_id' => '2',
  'title' => 'Food Review',
  'description' => 'Questionnaire About Food',
]);
$I->haveRecord('questionnaires', [
  'id' => '100',
  'user_id' => '3',
  'title' => 'test2',
  'description' => 'Questionnaire About Food',
]);
$I->haveRecord('questions', [
  'id' => '111',
  'questionnaires_id' => '1',
  'question' => 'testquestion',
]);
$I->haveRecord('choices', [
  'id' => '101',
  'question_id' => '111',
  'choice' => 'testchoice',
]);
$I->haveRecord('choices', [
  'id' => '102',
  'question_id' => '111',
  'choice' => 'testchoice2',
]);
$I->haveRecord('choices', [
  'id' => '103',
  'question_id' => '111',
  'choice' => 'testchoice3',
]);
//Check the user and questionnaire are in the DB
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '1']);
$I->seeRecord('questionnaires', ['title' => 'test2', 'id' => '100']);
$I->seeRecord('questions', ['question' => 'testquestion', 'id' => '111', 'questionnaires_id' => '1']);
$I->seeRecord('choices', ['choice' => 'testchoice', 'id' => '101', 'question_id' => '111']);
$I->seeRecord('choices', ['choice' => 'testchoice2', 'id' => '102', 'question_id' => '111']);
$I->seeRecord('choices', ['choice' => 'testchoice3', 'id' => '103', 'question_id' => '111']);

//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Take');

//Then
$I->amOnPage('/questionnaire/show');
//And
$I->see('Food Review');
$I->see('testquestion');
$I->see('testchoice');
$I->see('testchoice2');
$I->see('testchoice3');

//Then
$I->submitForm('#submitQuestionnaire', [
  'responses' => 'testchoice'
]);
$I->seeRecord('responses', ['responses' => 'testchoice']);
