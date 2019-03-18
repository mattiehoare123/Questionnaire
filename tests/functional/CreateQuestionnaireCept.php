<?php
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('Create A New Questionnaire');

//When
$I->amOnPage('/questionnaire/dashaboard');
$I->see('My Questionnaires', 'h1');
$I-dontSee('Food Review')
