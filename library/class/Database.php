<?php

class Database{
    protected $hostname = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "library";

    protected $db;

    public function __construct(){
        $this->db = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    }
}

?>