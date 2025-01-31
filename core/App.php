<?php
namespace core;
class App
{
    protected static $container;
    public static function setContainer($container) //set container value
    {
        static::$container = $container;
    }
    
    public static function container() //get container value
    {
        return static::$container;
    }
    public static function bind($key,$resolver){
        static::container()->bind($key,$resolver);
    }
    public static function resolve($key){
        return static::container()->resolve($key);
    }
}