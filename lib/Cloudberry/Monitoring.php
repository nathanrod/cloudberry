<?php

namespace Cloudberry;

class Monitoring extends \Requests{
    private $url = 'http://mbs.cloudberrylab.com:8090/api/Monitoring';
    private $token;
    private $headers;

    public function __construct($token){
        $this->token = $token;
        $this->headers["Authorization"] = "Bearer " . $this->token;
    }

    public function getMonitorings(){
        $request = $this::get($this->url, $this->headers);
        return json_decode( $request->body );
    }

    public function getMonitoringsByUserEmail( $email ){
        $request = $this::get($this->url . "?userEmail=$email", $this->headers);
        return json_decode( $request->body );
    }



}
