<?php


class DatabaseModel{
    private $conn=null;
    private function check_for_login($user_name,$password){
        $password=md5($password);
        try{
            $result=null;
            $sql_query="select id,prenume,trim(password) as p_word from users_table where email='{$user_name}'";
            $stmt=$this->conn->query($sql_query);
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            if($result!=null && $password==$result['p_word']){
                $_SESSION['logged']=true;
                $_SESSION['prenume']=$result['prenume'];
                $_SESSION['id_user']=$result['id'];
            }
            
               

        }catch(Excetion $e){
            echo "problema la nivelul conexiunii cu baza de date";
        }
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
        $this->check_for_login('radumugur1997@gmail.com','818574');
    }
}


new DatabaseModel();

?>