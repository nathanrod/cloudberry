<?php

class DestinationsTest extends PHPUnit_Framework_TestCase{
    public function testListPackages(){
        $provider = new \Cloudberry\Provider(API_USERNAME,API_PASSWORD);
        $token = $provider->getToken();
        $this->assertInstanceOf('stdClass', $token);
        $this->assertNotEmpty( $token->access_token );
        $d = new \Cloudberry\Destinations( $token->access_token );
        $destinations = $d->getDestinations();
        $this->assertInternalType('array', $destinations);
    }
}
