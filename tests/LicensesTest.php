<?php

class LicensesTest extends PHPUnit_Framework_TestCase{
    public function testListLicenses(){
        $provider = new \Cloudberry\Provider(API_USERNAME,API_PASSWORD);
        $token = $provider->getToken();
        $this->assertInstanceOf('stdClass', $token);
        $this->assertNotEmpty( $token->access_token );
        $l = new \Cloudberry\Licenses( $token->access_token );
        $licenses = $l->getLicenses();
        $this->assertInternalType('array', $licenses);
    }
}
