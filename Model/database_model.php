<?php


class DatabaseModel{
    private $conn=null;
   
    public function get_db_conn(){
        return $this->conn;
    }

    private function init_database_conn(){
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=proiect_tw', 'root', '');
        }catch(Exception $e){
            echo 'problema la initializarea conexiunii cu baza de date';
            $this->conn=null;
        }
    }
    public function __construct(){
        $this->init_database_conn();
        //$this->check_for_login('radumugur1997@gmail.com','818574');
    }
}



?>