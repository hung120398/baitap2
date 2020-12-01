<?php
    session_start();
    $controllerName = ucfirst($_GET['c'] ?? 'Login').'Controller';
    $actionName = strtolower($_GET['a'] ?? 'login');
    $controller = ['UserController','LoginController','LogoutController','BaseController'];
    $action = ['login','getviewedit','getviewadd','create','index','update','insert','delete'];
    if(!in_array($controllerName,$controller)||!in_array($actionName,$action)){
        header('location:?c=user&a=index');
    }
    include_once("app/controllers/${controllerName}.php");
    $controllerObj = new $controllerName;
    $controllerObj->$actionName();
   
           
           
 
       
