<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Edit A Questionnaire');

Auth::loginUsingId(2);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '999',
  'user_id' => '2',
  'title' => 'Food Review',
  'ethical' => 'Ethical Statmenet',
  'description' => 'Questionnaire About Food',
]);
//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '1010',
  'user_id' => '2',
  'title' => 'Dummy Review',
]);
$I->haveRecord('questions', [
  'id' => '301',
  'questionnaires_id' => '999',
  'question' => 'dummy question',
]);
$I->haveRecord('questions', [
  'id' => '111',
  'questionnaires_id' => '1010',
  'question' => 'testquestion',
]);
$I->haveRecord('choices', [
  'id' => '450',
  'question_id' => '301',
  'choice' => 'dummy choice',
]);
$I->haveRecord('choices', [
  'id' => '400',
  'question_id' => '111',
  'choice' => 'testchoice',
]);

//Check the user and questionnaire are in the DB
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '999']);
$I->seeRecord('questions', ['question' => 'testquestion', 'id' => '111', 'questionnaires_id' => '1010']);
$I->seeRecord('questions', ['question' => 'dummy question', 'id' => '301', 'questionnaires_id' => '999']);
$I->seeRecord('choices', ['choice' => 'dummy choice', 'id' => '450', 'question_id' => '301']);
$I->seeRecord('choices', ['choice' => 'testchoice', 'id' => '400', 'question_id' => '111']);


//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/index');

$I->see('Edit - Food Review');
$I->see('dummy question');
$I->see('dummy choice');
