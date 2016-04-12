<?php

namespace Cloudberry;

class Accounts extends \Requests{
    private $url = 'https://mbs.cloudberrylab.com:8090/api/Accounts';
    private $token;
    private $headers;

    public function __construct($token){
        $this->token = $token;
        $this->headers["Authorization"] = "Bearer " . $this->token;
    }

    public function getAccounts(){
        $request = $this::get($this->url, $this->headers);
        return json_decode( $request->body );
    }

    public function getAccountsById( $uid ){
        $request = $this::get($this->url . "/$uid", $this->headers);
        return json_decode( $request->body );
    }
}
