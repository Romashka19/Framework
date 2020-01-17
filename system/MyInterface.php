<?php


namespace System;


interface MyInterface
{
    public function select($sql);
    public static function delete($sql);
    public static function update($sql);
    public static function create($sql);
}