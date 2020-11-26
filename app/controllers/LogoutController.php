<?php
class LogoutController {
    public function __construct(){
        session_destroy();
        header('location: ?controller=Login&action=login');
    } 

}