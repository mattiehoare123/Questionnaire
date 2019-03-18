<?php
$I = new FunctionalTester($scenario);

$I->am('researcher');
$I->wantTo('Create A Questionnaire Title');

//When
$I->am('/questionnaire/create');
$I->see('Add Title');
$I->dontsee('Food Review');
//And
$I->submitForm('.createTitle', [
  'title' => null;
]);
//Then
$I->expectTo('See the error message with title required');
$I->see('The Title field is required');
//Then
$I->submitForm('.createTitle', [
  'title' => 'Food Review'
]);
//Then
$I->click('Add Title');
$I->see('Food Review');
