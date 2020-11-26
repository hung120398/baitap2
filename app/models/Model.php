<?php 
class model {
    protected $servername ='localhost';
    protected $username   ='root';
    protected $pass       = '';
    protected $dbname     = 'baitap2';
    protected $conn       = NULL;
    protected $result     = NULL;
   
    public function connect() {
        $this->conn = new mysqli($this->servername,$this->username,$this->pass,$this->dbname);
        if(!$this->conn) {
            echo "ket noi that bai";
            exit();
        } else {
            mysqli_set_charset($this->conn,'utf8');
        }
        
      return $this->conn;
      
    }
    
    public function execute( $sql){
        $this->result = $this->conn->query($sql);
        return $this->result;
    }
  

    

}
 

?>