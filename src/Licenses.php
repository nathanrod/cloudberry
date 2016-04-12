<?php

namespace Cloudberry;

class Licenses extends \Requests{
    private $url = 'http://mbs.cloudberrylab.com:8090/api/Licenses';
    private $token;
    private $headers;

    public function __construct($token){
        $this->token = $token;
        $this->headers["Authorization"] = "Bearer " . $this->token;
    }

    public function grantLicense($userId, $licenseId){
        $url = $this->url . "/Grant";
        $params = array('UserID' => $userId, 'LicenseID' => $licenseId );
        $request = $this::post($url, $this->headers, $params);
        return json_decode( $request->body );
    }

    public function releaseLicense($userId, $licenseId){
        $url = $this->url . "/Release";
        $params = array('UserID' => $userId, 'LicenseID' => $licenseId );
        $request = $this::post($url, $this->headers, $params);
        return json_decode( $request->body );
    }

    public function getLicenses( $filter=0 ){
        // 0 all , 1 available, 2 in use
        $url = $this->url;
        if( $filter == 1 )
            $url .= '?isAvailable=true';
        else if( $filter == 0 )
            $url .= '?isAvailable=false';
        $request = $this::get($url, $this->headers);
        return json_decode( $request->body );
    }

    public function getLicense( $licenseId ){
        $url = $this->url . "/" . $licenseId;
        $request = $this::get($url, $this->headers);
        return json_decode( $request->body );
    }
}
