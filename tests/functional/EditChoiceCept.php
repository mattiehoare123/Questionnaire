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

//Check the user and questionnaire are in the DB
$I->seeRecord('users', ['name' => 'testuser', 'id' => '1']);
$I->seeRecord('questionnaires', ['title' => 'Food Review', 'id' => '1']);
$I->seeRecord('questions', ['question' => 'testquestion', 'id' => '111', 'questionnaires_id' => '1']);
$I->seeRecord('choices', ['choice' => 'testchoice', 'id' => '101', 'question_id' => '111']);


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
$I->see('testchoice');
//And
$I->click('Edit Choice');

//Then
$I->seeCurrentUrlEquals('/question/111/choice/101/edit');
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
$I->seeRecord('choices', ['chocie' => 'editChoice']);
$I->see('editChoice');
