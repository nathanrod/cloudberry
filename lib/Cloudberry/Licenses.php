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

}
