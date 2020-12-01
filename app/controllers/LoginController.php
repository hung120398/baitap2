<?php
include 'app/models/User.php';
include 'app/controllers/BaseController.php';
class LoginController extends BaseController
{
    public function __construct()
    {
        $userModel = new User();
        $this->setModel($userModel);
    }

    public function Login()
    {
        $this->view('layouts.login');

        if (isset($_POST['submit'])) {
            if (isset($_POST['username']) || isset($_POST['password'])) {
                $data = $this->getModel()->checklogin($_POST['username'], md5($_POST['password']));
                if ($data !== 1) {
                    $_SESSION['error6'] = 'tên đăng nhập không đúng or mật khẩu không đúng';
                    $this->redirect('Login', 'login');
                }

                $_SESSION['user'] = [
                    'user' => $_POST['username'],
                ];
                $this->redirect('User', 'index');
            }
        }

    }

}
