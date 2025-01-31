<?php
namespace core;
use core\Middleware\Middleware;
use core\Response;

class Router{
    protected $routes=[];

    protected function abort($code=Response::NOT_FOUND){
        http_response_code($code);
        require "views/$code.php";
        die();
    }
    //return added in add,request method to resolve null return error for middleware work. 
    public function add($method,$uri,$controller)
    {
        $this->routes[]=[
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=> $method,
            'middleware'=> null
        ];

        return $this;
    }
    public function get($uri,$controller){
        return $this->add('GET',$uri,$controller);
    }
    public function post($uri,$controller){
        return $this->add('POST',$uri,$controller);
    }
    public function delete($uri,$controller){
        return $this->add('DELETE',$uri,$controller);
    }
    public function patch($uri,$controller){
        return $this->add('PATCH',$uri,$controller);
    }
    public function put($uri,$controller){
        return $this->add('PUT',$uri,$controller);
    }


    public function only($key){
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    //route controller implemented here as route
    public function route($uri,$method){
        foreach($this->routes as $route){
            if($route['uri'] == $uri && $route['method'] == strtoupper($method)){
                //apply the middleware
                Middleware::resolve($route['middleware']);
                return require 'http/controllers/'.$route['controller'];
            }
        }
        //abort
        $this->abort();
    }

    public function previousUrl(){
        return $_SERVER['HTTP_REFERER'];
    }
}

?>