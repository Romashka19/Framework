<?php

use System\Route;

Route::add('','Main@index');
Route::add('films','Films@index');
Route::add('films/create','Films@create');
Route::add('films/update','Films@update');
Route::add('auth/login','Auth@login');
Route::add('auth/register','Auth@register');
Route::add('auth/logout','Auth@logout');
Route::add('films/delete','Films@delete');
/*
return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],
    'films' => [
        'controller' => 'films',
        'action' => 'index',
    ],
    'films/create' => [
        'controller' => 'films',
        'action' => 'create',
    ],
    'films/update' => [
        'controller' => 'films',
        'action' => 'update',
    ],
    'auth/login' => [
        'controller' => 'auth',
        'action' => 'login',
    ],
    'auth/register' => [
        'controller' => 'auth',
        'action' => 'register',
    ],
    'auth/logout' => [
        'controller' => 'auth',
        'action' => 'logout',
    ],
    'films/delete' => [
        'controller' => 'films',
        'action' => 'delete',
    ],
];*/