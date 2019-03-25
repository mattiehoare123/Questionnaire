<?php
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('Delete A User');

//Enter A User In DB And Then Delete
$I->haveRecord('users', [
  'id' => '1',
  'name' => 'John Brown',
  'email' => 'johnb@example.com',
  'password' => '12345',
]);

//Check That The User In DB
$I->seeRecord('users', ['name' => 'John Brown', 'id' => '1']);

//When
$I->amOnPage('/admin/users');

//Then
$I->see('John Brown');
$I->seeLink('John Brown', 'users/1/edit');

//Then
$I->click('Delete');

//Then
$I->seeCurrentUrlEquals('/admin/users');

//Check That The User Has Been Deleted
$I->dontSee('John Brown');
$I->dontSeeLink('John Brown', 'users/1/edit');
