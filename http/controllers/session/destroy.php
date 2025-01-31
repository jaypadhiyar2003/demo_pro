<?php

use core\Authenticator;

global $serv;
(new Authenticator)->logout();
header("location: {$serv}/");
exit();
