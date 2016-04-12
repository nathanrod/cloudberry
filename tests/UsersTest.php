<?php

class UsersTest extends PHPUnit_Framework_TestCase{
    public function testListUsers(){
        $provider = new \Cloudberry\Provider(API_USERNAME,API_PASSWORD);
        $token = $provider->getToken();
        $this->assertInstanceOf('stdClass', $token);
        $this->assertNotEmpty( $token->access_token );
        $u = new \Cloudberry\Users( $token->access_token );
        $users = $u->getUsers();
        $this->assertInternalType('array', $users);
    }
}
