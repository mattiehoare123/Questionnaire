<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Collect Responses');

//Add A Test User
$I->haveRecord('users', [
  'id' => '1',
  'name' => 'testuser',
  'email' => 'test1@user.com',
  'password' => 'password',
]);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '1',
  'title' => 'Food Review',
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
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '1']);
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
$I->see('testchoice');
