# cloudberrylab.com php API library

## Usage example

````php

<?php

require_once 'vendor/Requests/library/Requests.php';
require_once 'lib/Cloudberry/Provider.php';
require_once 'lib/Cloudberry/Users.php';
require_once 'lib/Cloudberry/Licenses.php';
require_once 'lib/Cloudberry/Monitoring.php';

Requests::register_autoloader();
$username = 'MYUSERNAME';
$password = 'MYPASSWORD';
$auth = new \Cloudberry\Provider($username,$password);
$request = $auth->getToken();
$token = $request->access_token;
$request = new \Cloudberry\Users($token);
$users = $request->getUsers();
