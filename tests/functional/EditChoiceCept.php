<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Edit A Choice');

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

$I->haveRecord('choices', [
  'id' => '101',
  'question_id' => '111',
  'choice' => 'testchoice',
]);

//Check the user and questionnaire are in the DB
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '999']);
$I->seeRecord('questions', ['question' => 'testquestion', 'id' => '111', 'questionnaires_id' => '999']);
$I->seeRecord('choices', ['choice' => 'testchoice', 'id' => '101', 'question_id' => '111']);


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
//And
$I->click('Edit');

//Then
$I->seeCurrentUrlEquals('/question/111/edit');
//And
$I->see('Edit Question - testquestion');

//Then
$I->see('testchoice');
//And
$I->click('Edit Choice');

//Then
$I->seeCurrentUrlEquals('/choice/101/edit');
//And
$I->see('Edit Choice - testchoice');
//Then
$I->fillField('choice', null);
//And
$I->click('Update');

//Then
$I->expectTo('See the error message choice is required');
$I->see('The choice field is required');

//Then
$I->fillField('choice', 'editChoice');
//And
$I->click('Update');

//Then
$I->seeCurrentUrlEquals('/question/111/edit');
$I->seeRecord('choices', ['choice' => 'editChoice']);
$I->see('editChoice');
