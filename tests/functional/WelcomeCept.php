<?php
$I = new FunctionalTester($scenario);

$I->am('a admin');
$I->wantTo('test laravel');

//When
$I->amOnPage('/');

//then
$I->seeCurrentUrlEquals('/');
$I->See('Laravel');
