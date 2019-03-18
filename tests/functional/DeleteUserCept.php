<?php
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('Delete A User');

//Enter A User In DB And Then Delete 
$I->haveRecord('users', [
  'id' => '1',
  'name' => 'John Brown',
  'email' => 'johnb@example.com'
  'password' => '12345',
]);

//Check That The User In DB
$I->seeRecord('users', ['name' => 'John Brown', 'id' => '1']);

//When
$I->amOnPage('/admin/users');

//Then
$I->see('John Brown');
$I->seeElement('John Brown', 'a.item');

//Then
$I->click('testuser delete');

//Then
$I->seeCurrentUrlEquals('admin/users');

//Check That The User Has Been Deleted
$I->dontSee('John Brown');
$I->dontSeeElement('John Brown', 'a.item');
