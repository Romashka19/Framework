<?php


namespace System;


class Errors
{
    public static function errorCode($code){
        http_response_code($code);
        require  'front-end/errors/'.$code.'.php';
        exit;
    }
}