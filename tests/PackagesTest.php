<?php

class PackagesTest extends PHPUnit_Framework_TestCase{
    public function testListPackages(){
        $provider = new \Cloudberry\Provider(API_USERNAME,API_PASSWORD);
        $token = $provider->getToken();
        $this->assertInstanceOf('stdClass', $token);
        $this->assertNotEmpty( $token->access_token );
        $p = new \Cloudberry\Packages( $token->access_token );
        $packages = $p->getPackages();
        $this->assertInternalType('array', $packages);
    }
}
