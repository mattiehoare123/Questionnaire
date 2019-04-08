<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Update The Questionnaire Title');

Auth::loginUsingId(2);

//Add A Questionnaire
$I->haveRecord('questionnaires', [
  'id' => '999',
  'user_id' => '2',
  'title' => 'Food Review',
  'ethical' => 'Ethical Statmenet',
  'description' => 'Questionnaire About Food',
]);

$I->haveRecord('questions', [
  'id' => '111',
  'questionnaires_id' => '999',
  'question' => 'testquestion',
]);

$I->haveRecord('questions', [
  'id' => '115',
  'questionnaires_id' => '1000',
  'question' => 'dummy',
]);

//Check the user and questionnaire are in the DB
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '999']);
$I->seeRecord('questions', ['question' => 'testquestion', 'id' => '111', 'questionnaires_id' => '999']);
$I->seeRecord('questions', ['question' => 'dummy', 'id' => '115', 'questionnaires_id' => '1000']);


//When
$I->amOnPage('/dashboard');
$I->see('My Questionnaires');
$I->see('Food Review');
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/index');
//And
$I->see('Edit - Food Review');
$I->see('testquestion');
$I->dontSee('dummy');
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
$I->selectOption('input[name=required]', 1);
//And
$I->click('Update');

//Then
$I->seeCurrentUrlEquals('/questionnaire/999/index');
$I->seeRecord('questions', ['question' => 'editquestion']);
$I->see('editquestion');
