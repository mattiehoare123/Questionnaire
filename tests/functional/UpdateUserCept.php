<?php
$I = new FunctionalTester($scenario);

$I->am('admin');
$I->wantTo('Update A User');

//Enter A User In DB To Update
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

$I->seeElement('a', ['name' => 'John Brown']);
//And
$I->click('a', ['name' => 'John Brown']);

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
$I-click('Update User');

//Then
$I->expectedTo('See the form but with required fields need filling');
$I->seeCurrentUrlEquals('admin/users/1/edit');
$I->see('The Name, Email & Password fields are required');
//Then
$I->fillfield('name', 'John Black');
$I->fillfield('email', 'johnnyb@example.com');
$I->fillfield('password', '678910');
//And
$I->click('Update User');

//Then
$I->seeCurrentUrlEquals('admin/users');
$I->seeRecord('users', ['name' => 'John Black']);
$I->see('Users', 'h1');
$I->see('User Updated');
