<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Submit A Questionnaire');

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
$I->haveRecord('responses', [
  'id' => '100',
  'question_id' => '1',
  'choice_id' => '101',
  'responses' => 'testchoice'
]);
//Check the user and questionnaire are in the DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '1']);
$I->seeRecord('questions', ['question' => 'testquestion', 'id' => '111', 'questionnaires_id' => '1']);
$I->seeRecord('choices', ['choice' => 'testchoice', 'id' => '101', 'question_id' => '111']);
$I->seeRecord('responses', ['responses' => 'testchoice', 'id' => '100', 'choice_id' => '101', 'question_id' => '1']);


//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Responses');

//Then
$I->amOnPage('/responses/show');
//And
$I->see('Food Review');
$I->see('testquestion');
$I->see('testchoice');
