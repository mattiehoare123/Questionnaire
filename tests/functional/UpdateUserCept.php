<?php
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('Update A User');

//Enter A User In DB To Update
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
$I->see('John Brown');

$I->seeLink('John Brown', 'users/1/edit');
//And
$I->click('Edit');

//Then
$I->amOnPage('/admin/users/1/edit');
//And
$I->see('Edit User - John Brown', 'h1');

//And
$I->amGoingTo('Delete The Name In Field And Submit Invalid Entry');

//When
$I->fillfield('name', null);
$I->fillfield('email', null);
$I->fillfield('password', null);

//And
$I->click('Update');

//Then
$I->expectTo('See the form but with required fields need filling');
$I->seeCurrentUrlEquals('/admin/users/1/edit');
$I->see('The Name field is required');
$I->see('The email field is required');
$I->see('The password field is required');

//Then
$I->fillfield('name', 'John Black');
$I->fillfield('email', 'johnnyb@example.com');
$I->fillfield('password', '678910');
//And
$I->click('Update');

//Then
$I->seeCurrentUrlEquals('/admin/users');
$I->seeRecord('users', ['name' => 'John Black']);
$I->see('Users', 'h1');
$I->see('User Updated');
