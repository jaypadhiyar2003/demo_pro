<?php

namespace core\Middleware;

class Auth{
    public function handle(){
        global $serv;
        if(!$_SESSION['user'] ?? false){
            header("location: {$serv}/");
            exit();
        }
    }

}