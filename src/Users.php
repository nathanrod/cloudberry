<?php

namespace Cloudberry;

class Users extends \Requests{
    private $url = 'http://mbs.cloudberrylab.com:8090/api/Users';
    private $token;
    private $headers;

    public function __construct($token){
        $this->token = $token;
        $this->headers["Authorization"] = "Bearer " . $this->token;
    }

    public function getUsers(){
        $request = $this::get($this->url, $this->headers);
        return json_decode( $request->body );
    }

    public function getUserById( $uid ){
        $request = $this::get($this->url . "/$uid", $this->headers);
        return json_decode( $request->body );
    }

    public function updateUser( $user ){
        $request = $this::put($this->url, $this->headers, $user);
        return json_decode( $request->body );
    }

    public function createUser( $user ){
        $request = $this::post($this->url, $this->headers, $user);
        return json_decode( $request->body );
    }

    public function deleteUser( $uid ){
        $request = $this::delete($this->url . "/$uid", $this->headers, $uid);
        return json_decode( $request->body );
    }



}
