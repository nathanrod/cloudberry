<?php

namespace Cloudberry;

class Packages extends \Requests{
    private $url = 'http://mbs.cloudberrylab.com:8090/api/Packages';
    private $token;
    private $headers;

    public function __construct($token){
        $this->token = $token;
        $this->headers["Authorization"] = "Bearer " . $this->token;
    }

    public function getPackages(){
        $request = $this::get($this->url, $this->headers);
        return json_decode( $request->body );
    }

    public function getPackagesById( $pid ){
        $request = $this::get($this->url . "/$pid", $this->headers);
        return json_decode( $request->body );
    }

    public function getPackagesByUserId( $oid ){
        $request = $this::get($this->url . "?userID=$uid", $this->headers);
        return json_decode( $request->body );
    }

    public function updatePackage( $package ){
        $request = $this::put($this->url, $this->headers, $package);
        return json_decode( $request->body );
    }

    public function createPackage( $package ){
        $request = $this::post($this->url, $this->headers, $package);
        return json_decode( $request->body );
    }

    public function deletePackage( $pid ){
        $request = $this::delete($this->url . "/$uid", $this->headers, $pid);
        return json_decode( $request->body );
    }




