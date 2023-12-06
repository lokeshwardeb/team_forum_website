<?php
class connect {
    private $hostname;
    private $db_username;
    private $db_password;
    private $dbname;

    protected function connection(){
        $this->hostname = 'localhost';
        $this->db_username = 'root';
        $this->db_password = '';
        $this->dbname = 'forum_website';

        $conn = new mysqli($this->hostname, $this->db_username, $this->db_password, $this->dbname);

        if(mysqli_connect_error()){
            echo "error occurs connect";
        }else{
            // echo "connected";
        }

        return $conn;


    }




}


?>