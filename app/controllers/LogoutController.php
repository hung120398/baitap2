<?php
class LogoutController {
    public function __construct(){
        session_destroy();
        header('location: ?c=Login&a=login');
 
    } 

}