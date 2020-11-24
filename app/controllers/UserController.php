<?php 
/**
 * 
 */
class UserController extends AdminController
{
	public function __construct(){
		$userModel = new User();
		$this->setModel($userModel);
	} 
	
	public function index(){
		$data = $this->getModel()->getList();
	}

	public function create(){

	}

	public function update(){

	}

	public function delete(){

	}

}