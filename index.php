<?php

use core\Session;
use core\ValidationException;

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'core/functions.php';
spl_autoload_register(function ($class) {
    //core\Database
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class); // THIS is used after creating namespace beacuse now we need to load class by \ this seperator
    require("{$class}.php");
});

require 'bootstrap.php';
$router = new \core\Router();

$routes = require('routes.php');
//this mehod give base path or route
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
//here we check internal server or Appace local server which is used
$serv = ($_SERVER['DOCUMENT_ROOT'] == '/Applications/XAMPP/xamppfiles/htdocs') ? '/demo_pro' : '';
//make route value comman for both
$uri = str_replace($serv, '', $uri);

$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];


try {
    $router->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);
    return redirect_refer($router->previousUrl()); //return redirect('/session');
}
Session::unflash();
