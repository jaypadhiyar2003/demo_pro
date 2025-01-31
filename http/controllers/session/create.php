<?php

use core\Session;

$heading = "Login Page ";
$errors = Session::get('errors');        
require 'views/session/create.view.php';