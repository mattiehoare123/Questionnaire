<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Update The Questionnaire Title');

Auth::loginUsingId(2);

//Add A Test User
$I->haveRecord('users', [
  'id' => '999',
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

//Check the user and questionnaire are in the DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '999']);
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '1']);
$I->seeRecord('questions', ['question' => 'testquestion', 'id' => '111', 'questionnaires_id' => '1']);

//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire');
//And
//$I->see('Edit - Food Review');
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/question/111/edit');
//And
$I->see('Edit Question - testquestion');


//Then
$I->fillField('question', null);
//And
$I->click('Update');

//Then
$I->expectTo('See the error message question is required');
$I->see('The question field is required');
//Then
//Then
$I->fillField('question', 'editquestion');
//And
$I->click('Update');

//Then
$I->seeCurrentUrlEquals('/questionnaire');
$I->seeRecord('questions', ['question' => 'editquestion']);
$I->see('editquestion');
