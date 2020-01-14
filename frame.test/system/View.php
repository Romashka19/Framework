<?php


namespace System;


class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'].'/'.$route['action'];
    }

   public function render($title, $vars = []){
        extract($vars);

        ob_start();
        require __DIR__.'/../front-end/'.$this->path.'.php';
        $content = ob_get_clean();
        require __DIR__.'/../front-end/layout/'.$this->layout.'.php';
    }

    /*public function redirect($url){
        header('location: '.$url);
        exit;
    }*/


}