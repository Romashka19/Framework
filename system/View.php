<?php


namespace System;


class View
{
    public static $path;
    public $route;

    public function __construct($route)
    {
        $this->route = $route;//array(2) {["controller"]=>string(4)"main" ["action"]=>string(5) "index"
        self::$path = lcfirst($route['0'].'/'.$route['1']);//string(10) "main/index"
    }


    public static function render($title,$layout, $vars = []){
        extract($vars);
        ob_start();
        require __DIR__ . '/../front-end/' .self::$path.'.php';
        $content = ob_get_clean();
        include __DIR__ . '/../front-end/layout/' .$layout;
        //require __DIR__ . '/../front-end/layout/' .$this->layout.'.php';
    }

   /* public function redirect($url){

        header('location: '.$url);
        exit;
    }
*/

}