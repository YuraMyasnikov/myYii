<?php

namespace tests\unit\models;

use app\models\Userr;

class UserTest extends \Codeception\Test\Unit
{
    public function testFindUserById()
    {
        verify($user = Userr::findIdentity(100))->notEmpty();
        verify($user->username)->equals('admin');

        verify(Userr::findIdentity(999))->empty();
    }

    public function testFindUserByAccessToken()
    {
        verify($user = Userr::findIdentityByAccessToken('100-token'))->notEmpty();
        verify($user->username)->equals('admin');

        verify(Userr::findIdentityByAccessToken('non-existing'))->empty();
    }

    public function testFindUserByUsername()
    {
        verify($user = Userr::findByUsername('admin'))->notEmpty();
        verify(Userr::findByUsername('not-admin'))->empty();
    }

    /**
     * @depends testFindUserByUsername
     */
    public function testValidateUser()
    {
        $user = Userr::findByUsername('admin');
        verify($user->validateAuthKey('test100key'))->notEmpty();
        verify($user->validateAuthKey('test102key'))->empty();

        verify($user->validatePassword('admin'))->notEmpty();
        verify($user->validatePassword('123456'))->empty();        
    }

}
