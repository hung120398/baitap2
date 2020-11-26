<?php 
/**
 * 
 */
include 'app/models/User.php';
include 'app/controllers/BaseController.php';

class UserController extends BaseController
{
	
	public function __construct(){
		if(!isset($_SESSION['user'])){
		header("location: ?controller=Login&action=Login");
		}
		$userModel = new User();
	    $this->setModel($userModel);
	} 

	public function index(){
		$data = $this->getModel()->getList();
		$this->view('layouts.show',$data);
	}

	public function getViewAdd(){
	   $this->view('layouts.add');
	}


	public function getViewEdit(){
		$data = $this->getModel()->getData($_GET['id']);
		$this->view('layouts.edit',$data);
	}
	public function update(){
	  $id		= $_GET['id'];
	  $username = $_POST['username'];
	  $email	= $_POST['email'];
	  $update_by = $_SESSION['user']['user'];
	  $updated	 = date('y-m-d');
	  $data = [
		  'name' => $username,
		  'email'	 => $email,
		  'updated_by'=> $update_by,
		  'updated'	 => $updated,
	  ];
	  $data1 = $this->getModel()->update($data ,$id);
	  header('location: ?controller=user&action=index');
	}

	public function delete(){
		$id = $_GET['id'];
		$delete_flag = 1;
		$data = [
			'delete_flag' => $delete_flag,
		];
		$data1 = $this->getModel()->update($data ,$id);
		header('location: ?controller=user&action=index');
	}

	public function create() {
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$email = $_POST['email'];
	    $data = [
			'name' => $user,
			'email' => $email,
			'password' => $pass,
			'created_by' => $_SESSION['user']['user'],
			'created' => date('y-m-d'),
		];
		$data1 = $this->getModel()->insert($data);
		$data2 = "tên đăng nhập đã tồn tại";
		$data1 = "Duplicate entry '".$user."' for key 'name'"?$data2:'thêm thành công';
		
		// echo $data1."<br>";
		// echo $data2."<br>";
		// $keys =implode("','",array_keys($data));
		// $values = implode("','",array_values($data));
		// $values = "'".$values."'";
		// echo $keys."<br>";
		// echo $values."<br>";
		// header('location: ?controller=user&action=index');
	}
	
	
}