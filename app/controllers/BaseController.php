<?php 

/**
 * 
 */
class BaseController
{
	protected $model = [];
	const VIEW_FOLDER_NAME = 'app/views';
	
	


	public function index(){

	}

	public function create(){

	}

	public function update(){

	}

	public function delete(){
		
	}

	public function setModel($model){
		$this->model = $model;
	}

	public function getModel(){
		return $this->model;
	}
	
	public function view($viewpath, $data = []) {
		
		require (self::VIEW_FOLDER_NAME.'/'.str_replace('.','/',$viewpath).'.php');
	}

	
}