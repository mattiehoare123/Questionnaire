<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Submit Questionnaire');

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

//Add Choices To The Question
$I->haveRecord('choice', [
  'id' => '101',
  'question_id' => '111',
  'choice' => 'Fish',
]);
$I->haveRecord('choice', [
  'id' => '102',
  'question_id' => '111',
  'choice' => 'Chicken',
]);
$I->haveRecord('choice', [
  'id' => '103',
  'question_id' => '111',
  'choice' => 'Soup',
]);

//Check The Record
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);
$I->seeRecord('questionnaire', ['title' => 'Food Review', 'id' => '100']);
$I->seeRecord('question', ['question' => 'What was the best starter', 'id' => '111', 'questionnaire_id' => '100']);
$I->seeRecord('choice', ['choice' => 'Chicken', 'id' => '102', 'question_id' => '111']);

//When
$I->amOnPage('/questionnaire/dashboard/1');
$I->see('My Questionnaires');

//Then
$I->seeElement('a', ['title' => 'Food Review']);
//And
$I->click('Take');

//Then
$I->seeCurrentUrlEquals('/questionnaire/show/100s');
//And
$I->see('Food Review');
$I->see('What was the best starter');

//Then
$I->click('Submit');

//And
$I->expectTo('See a error message that a required question has not been answered');
$I->see('Please answer all questions');

//Then
$I->choose('Fish');
//And
$I->click('Submit');
