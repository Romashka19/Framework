<?php


namespace System;


class View
{
    public $path;
    public $route;

    public function __construct($route)
    {
        $this->route = $route;//array(2) {["controller"]=>string(4)"main" ["action"]=>string(5) "index"
        $this->path = lcfirst($route['0'].'/'.$route['1']);//string(10) "main/index"
    }


    public function render($data = []){
        extract($data);
        ob_start();
        require __DIR__ . '/../front-end/' .$this->path.'.php';
       // $content = ob_get_clean();
        //debug($content);
        //include __DIR__ . "/../front-end/layout/default.php";
    }

}