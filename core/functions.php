<?php

use core\Response;

function dd($gloarr)
{
  echo "<pre>";
  var_dump($gloarr);
  echo "</pre>";
  die();
}

function url($req)
{
  return $_SERVER['REQUEST_URI'] === $req;
}
function abort($code = Response::NOT_FOUND)
{
  http_response_code($code);
  require "views/$code.php";
  die();
}
function authorize($condition, $status = Response::FORBIDDEN)
{
  if ($condition) { //this will true if unauthenticated user try to access the note. Remeber user id is hardcoded so change it after authentication
    abort($status);
  }
}

function redirect($path){
  global $serv;
  header("location: {$serv}{$path}");
  exit();
}

function redirect_refer($path){ //this created for http_referense of server where we get origanl full path
  header("location: {$path}");
  exit();
}

function old($key,$default = '')
{
  return core\Session::get('old')[$key] ?? $default;
}
