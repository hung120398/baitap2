<?php

/**
 *
 */
class BaseController
{
    protected $model = [];
    const VIEW_FOLDER_NAME = 'app/views';

    public function index()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function getModel()
    {
        return $this->model;
    }

    public function view($viewpath, $data = [])
    {

		return require self::VIEW_FOLDER_NAME . '/' . str_replace('.', '/', $viewpath) . '.php';
		exit;
    }
    public function redirect($c, $a)
    {

        header("location:?c=" . $c . "&a=" . $a);
        exit;
	}
	
	public function getpostinput($str){
		return $username = isset($_POST[$str])?$_POST[$str]:' ';
		

	}
	public function getgetinput($str){
		return $username = isset($_GET[$str])?$_GET[$str]:' ';
		

	}

}
