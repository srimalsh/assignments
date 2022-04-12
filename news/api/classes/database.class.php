<?php

class Database{
    private $connection;

    function __construct(){
        if(!$this->connection){
            $this->openConnection();
        }
    }

    private function openConnection(){
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWD,DB_DATABASE);
        if($conn->connect_error){
            die("failed to connect : ".$conn->connect_error);
        }
        $this->connection = $conn;
    }

    function result(){

    }

    function query($SQL){
        $result =  $this->connection->query($SQL);
        $count = 0;
        $return = array();

        if ($result->num_rows > 0) {        
            while($row = $result->fetch_assoc()) {
                $return[$count] = $row;
                $count++;
            }

            return $return;

        } else {
            return false;
        }        
    }

    function clean($SQL){
        return $this->connection->real_escape_string($SQL);
    }

    function __destruct(){
        $this->connection->close();

    }
}

?>