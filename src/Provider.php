<?php

namespace Cloudberry;

class Provider{
    private $url = 'http://mbs.cloudberrylab.com:8090/api/Provider/Login';
    private $username;
    private $password;

    public function __construct( $username, $password ){
        $this->username = $username;
        $this->password = $password;
    }

    public function getToken(){
        $request = \Requests::post($this->url, array(), array('UserName' => $this->username,'Password' => $this->password));
//var_dump($request);
        return json_decode( $request->body );
    }
}
