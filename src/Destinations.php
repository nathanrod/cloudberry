<?php

namespace Cloudberry;

class Destinations extends \Requests{
    private $url = 'http://mbs.cloudberrylab.com:8090/api/Destinations';
    private $token;
    private $headers;

    public function __construct($token){
        $this->token = $token;
        $this->headers["Authorization"] = "Bearer " . $this->token;
    }

    public function getDestinations(){
        $request = $this::get($this->url, $this->headers);
        return json_decode( $request->body );
    }

    public function getDestinationsByUserEmail( $email ){
        $request = $this::get($this->url . "?userEmail=$email", $this->headers);
        return json_decode( $request->body );
    }

    public function addDestination( $uid, $aid, $destination, $pid){
        $params = array('UserID' => $uid, 'AccountID' => $aid, 'Destination' => $destination, 'PackageID' => $pid );
        $request = $this::put($this->url, $this->headers, $params);
        return json_decode( $request->body );
    }

}
