<?php


namespace System;

use System\Errors;


class Route
{

    public static $routes = [];

    public static function add($route,$params){
        self::$routes[] = [
            "route" => $route,
            "params" => $params
        ];
        //var_dump(self::$routes[$route]);
    }
    public static function run(){
        $url = trim($_SERVER['REQUEST_URI'],'/');
        if(stripos($url,"?") != null) {
            $url = strstr($url,"?",true);
            $url = trim($url,'/');
        }
       //создать для стартовой страницы
            foreach (self::$routes as $value) {
                if ($value["route"] == $url) {
                    $res = explode('@', $value['params']);
                    $controller = $res['0'];
                    $action = $res['1'];
                    $path = 'App\Controllers\\' . $controller . 'Controller';
                    if (method_exists($path, $action)) {
                        $controller = new $path($res);
                        $controller->$action();
                    }
                }
            }

    }
/*
    public  $routes = [];
    private  $params= [];
    public function __construct(){
        $arr = require __DIR__ . '/../request/routes.php';
        foreach ($arr as $key => $val){
            $this->add($key, $val);
        }
    }
    public function add($route, $params){
        $route = '#^'.$route.'$#';
        $this->routes[$route] = $params;

    }
    public function match(){
        $url = trim($_SERVER['REQUEST_URI'],'/');
        foreach ($this->routes as $route => $params){
            if(preg_match($route, $url)){
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
    public function run(){
        if ($this->match()){
            $path = 'App\Controllers\\'.ucfirst($this->params['controller']).'Controller';
            //debug($path);
            if(class_exists($path)){
               $action = $this->params['action'];
               if(method_exists($path, $action)){
                    $controller = new $path($this->params);
                    $controller->$action();
               }else{
                   Errors::errorCode(404);
               }
            }else{
                Errors::errorCode(404);
            }
        } else{
            Errors::errorCode(404);
        }

    }
*/
}