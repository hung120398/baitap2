<?php
session_start();
$controllerName = ucfirst($_GET['controller'] ?? 'Login').'Controller';
$actionName = strtolower($_GET['action'] ?? 'Login');
include_once("app/controllers/${controllerName}.php");
$controllerObj = new $controllerName;
$controllerObj->$actionName();
            
          
           
           
 
       
