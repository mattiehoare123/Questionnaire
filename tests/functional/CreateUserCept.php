<?php
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('create a new user');

Auth::loginUsingId(1);

//When
$I->amOnPage('/admin/users');
$I->see('Users', 'h1');
//And
$I->click('Add User');

//Then
$I->amOnPage('/admin/users/create');
//And
$I->see('Add User', 'h1');
$I->submitForm('#createUser', [
  'name' => 'Matthew Hoare',
  'email' => '23655704@edgehill.ac.uk',
  'password' => '12345',
]);
//Then
$I->seeCurrentUrlEquals('/admin/users');
$I->see('New user added');
$I->see('Matthew Hoare');

//Check for Duplicates

//When
$I->amOnPage('/admin/users');
$I->see('Users', 'h1');
$I->see('Matthew Hoare');
//And
$I->click('Add User');

//Then
$I->amOnPage('/admin/users/create');
//And
$I->see('Add User', 'h1');
$I->submitForm('#createUser', [
  'name' => 'Matthew Hoare',
  'email' => '23655704@edgehill.ac.uk',
  'password' => '12345'
]);
//Then
$I->see('Error user already exists!');
