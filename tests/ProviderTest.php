<?php

class ProviderTest extends PHPUnit_Framework_TestCase{

    public function testGetToken(){
        $provider = new \Cloudberry\Provider(API_USERNAME,API_PASSWORD);
        $token = $provider->getToken();
        $this->assertInstanceOf('stdClass', $token);
        $this->assertNotEmpty( $token->access_token );
    }

}
