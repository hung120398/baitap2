<?php
include 'app/models/User.php';
include 'app/controllers/BaseController.php';
class LoginController extends BaseController{
    public function __construct(){
        $this->view('layouts.login');
		$userModel = new User();
	    $this->setModel($userModel);
    } 
    
    public function Login() {
      if(isset($_POST['submit'])) {
          if(isset($_POST['username'])|| isset($_POST['password'])) {
            $data = $this->getModel()->checklogin($_POST['username'],$_POST['password']);
            if($data ==1) {
                $_SESSION['user']=[
                    'user' => $_POST['username'],
                ];
                header('location: ?controller=User&action=index');
            }
            } else {
              echo 'ss';
          }
          
      }
    }
    

}