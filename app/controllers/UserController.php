<?php

include 'app/models/User.php';
include 'app/controllers/BaseController.php';

class UserController extends BaseController
{

    public function __construct()
    {

        $userModel = new User();
        $this->setModel($userModel);
    }
    public function checklogin()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('Login','login');
        }
    }
    public function index()
    {
        $this->checklogin();
        $data = $this->getModel()->getList();
        return $this->view('layouts.show', $data);
    }

    public function getviewadd()
    {
        $this->checklogin();
        unset($_SESSION['add']);
        unset($_SESSION['error']);
        return $this->view('layouts.add');
    }

    public function getviewedit()
    {
        $this->checklogin();
        $data = $this->getModel()->getData($_GET['id']);
        $this->view('layouts.edit', $data);
    }

    public function update()
    {
        $this->checklogin();
        unset($_SESSION['add']);
        $id = $this->getgetinput('id');
        $username =$this->getpostinput('username');;
        $email = $this->getpostinput('email');
        $update_by = $_SESSION['user']['user'];
		$updated = date('y-m-d');
	
		if($id==''||$username==''||$email==""){
            $_SESSION['error'] ='1 trong các trường không được bỏ chống';
            
            $this->view('layouts.edit');
        }

		if($this->is_Email($email)==false) {
			$_SESSION['error'] ='email sai định dạng';

			$this->view('layouts.edit');
		}
        $data = [
            'name' => $username,
            'email' => $email,
            'updated_by' => $update_by,
            'updated' => $updated,
        ];
        $data1 = $this->getModel()->update($data, $id);
        //check lỗi của database nếu có lỗi xảy ra thì gán cho session =1
        if($data1!==""){
            $_SESSION['edit']='có lỗi xảy ra';
            $this->redirect('user', 'index');
        }
		$_SESSION['edit']='sửa thành công';
        $this->redirect('user', 'index');
    }

    public function delete()
    {
        $this->checklogin();
        unset($_SESSION['delete']);
        $id = $this->getgetinput('id');
        $delete_flag = 1;
        $update_by = $_SESSION['user']['user'];
        $updated = date('y-m-d');
        $data = [
            'delete_flag' => $delete_flag,
            'updated_by' => $update_by,
            'updated' => $updated,
        ];
        $data1 = $this->getModel()->update($data, $id);
        if($data1!==''){
            $_SESSION['delete']='đã có lỗi xảy ra vui lòng thử lại';
            $this->redirect('user', 'index');
        }
        $_SESSION['delete'] = 'đã xóa thành công';
            $this->redirect('user', 'index');
    }

    public function create()
    {   unset( $_SESSION['usertam']);
        unset( $_SESSION['emailtam']);
		$this->checklogin();
		unset($_SESSION['error']);
        unset($_SESSION['add']);
        
        $user = $this->getpostinput('username');
        $pass = $this->getpostinput('password');
        $pass1 = $this->getpostinput('re_password');
        $email = $this->getpostinput('email');
        $_SESSION['usertam']=$user;
        $_SESSION['emailtam']=$user;

        if ($user == '' || $pass == ''
            || $pass1 == '' || $email == '') {
            $_SESSION['error'] = 'một trong các trường không được bỏ trống';
            return $this->view('layouts.add');
        }

        if ($pass !== $pass1) {
            $_SESSION['error'] = 'password không khớp';
            return $this->view('layouts.add');
        }

        if ($this->is_Password($pass) == false) {
            $_SESSION['error'] = 'password phải bao gồm cả chữ và số và
			chữ hoa chữ thường';
            return $this->view('layouts.add');
        }

        if ($this->is_Email($email) == false) {
            $_SESSION['error'] = 'password phải bao gồm cả chữ
			 và số và chữ hoa chữ thườngthường';
            return $this->view('layouts.add');
        }
        $_SESSION['about']['user'] = [
            'name' => $user,
            'email' => $email,
            'password' => $pass,

        ];
        $this->view('layouts.add');

    }

    public function insert()
    {
        $this->checklogin();
		unset($_SESSION['add']);
		if(!isset($_SESSION['about']['user']['name'])){
		$this->redirect('user','create');

		}

		$data = [
            'name' => $_SESSION['about']['user']['name'],
            'email' => $_SESSION['about']['user']['email'],
            'password' => md5($_SESSION['about']['user']['password']),
            'created_by' => $_SESSION['user']['user'],
            'created' => date('y-m-d'),
		];
        $data1 = $this->getModel()->insert($data);

       

        $data2 = "tên đăng nhập đã tồn tại!!";
        if ($data1 == "Duplicate entry '" . $_SESSION['about']['user']['name'] . "' for key 'name'") {
            $_SESSION['error'] = $data2;
            unset($_SESSION['about']['user']);
            return $this->view('layouts.add');

        }
        $_SESSION['add'] = '1';
        unset($_SESSION['about']['user']);
        return $this->view('layouts.add');
    }

    public function is_Email($str)
    {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+
		[a-z]{2,6}$/ix", $str)) ? false : true;
    }

    public function is_Password($password)
    {
        return (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i", $password)) ? false : true;
    }

}
