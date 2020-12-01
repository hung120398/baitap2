<?php

include 'app/models/Model.php';
/**
 *
 */
class User extends model
{

    protected $tableName = "users";
    protected $primaryKey = "id";
    protected $alias = "users";
    protected $result1 = null;
    public function __construct()
    {
        $this->connect();
    }

    public function checklogin($username, $password)
    {
        $sql = "SELECT  * FROM users where name ='$username'
		and password= '$password' and delete_flag = 0";
        $this->execute($sql);
        $result3 = $this->result->num_rows;
        return $result3;
    }

    public function getList()
    {
        $sql = "select * from users where delete_flag = 0";
        $this->execute($sql);
        $data1 = [];
        $data = [];
        while ($row = mysqli_fetch_assoc($this->result)) {
            array_push($data, $row['id'], $row['name'], $row['email']);
            array_push($data1, $data);
            $data = [];
        }
        return $data1;
    }

    public function getData($id)
    {
        $sql = "select * from users where id='$id'";
        $this->execute($sql);
        $row = mysqli_fetch_assoc($this->result);
        return $row;

    }

    public function update($data = [], $id)
    {

        $sql = "update $this->tableName set ";
        foreach ($data as $key => $value) {
            $sql .= " $key = '$value' , ";
        }
        $sql = rtrim($sql, ' ,');
        $sql .= " WHERE $this->primaryKey = ${id} ";
        $this->execute($sql);
        return $this->conn->error;
    }

    public function insert($data = [])
    {
        $keys = implode(",", array_keys($data));
        $values = implode("','", array_values($data));
        $values = "'" . $values . "'";

        $sql = "INSERT INTO $this->tableName ($keys)
		 values($values)";
        $this->execute($sql);
        return $this->conn->error;

    }

    
}
