<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Lavarel works');
$I->amOnPage('/');
$I->see('Lavarel');
