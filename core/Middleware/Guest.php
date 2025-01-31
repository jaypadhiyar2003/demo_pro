<?php

namespace core\Middleware;

class Guest{
    public function handle(){
        global $serv;
        if($_SESSION['user'] ?? false){
            header("location: {$serv}/");
            exit();
        }
    }
    
}