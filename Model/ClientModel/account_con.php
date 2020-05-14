<?php

class AccountConnection(){
    private $conn=null;
    
    private function init_database_conn(){
        try{
            $this->conn = new PDO('mysql:host=localhost;dbname=proiect_tw', 'root', '');
        }catch(Exception $e){
            echo 'problema la initializarea conexiunii cu baza de date';
            $this->conn=null;
        }
    }
    
    private function check_for_email($email){
        $query="SELECT * FROM USERS_TABLE WHERE EMAIL='{$email}'";
        $stms=$this->conn->query($query);
        $result=$stms->fetch();
        if($result==false){//daca user-ul nu exista returnam false
            return false;
        }
        return true;
    }

    private function check_for_password($email,$password){//used for login process
        $password=md5($password);
        $query="SELECT * FROM USERS_TABLE WHERE EMAIL='{$email}'";
        $stms=$this->conn->query($query);
        $result=$stms->fetch(PDO::FETCH_ASSOC);
        if($result){
            if($password==$result['password']){
                return true;
            }else{
                return false;
            }
        }    
        return false;   
    }
    public function perform_login($email,$password){
        if(check_for_password($email,$password)){
            $query="SELECT * FROM USERS_TABLE WHERE EMAIL='{$email}'";
            $stms=$this->conn->query($query);
            $result=$stms->fetch(PDO::FETCH_ASSOC);
            $_SESSION['LOGGED']=true;
            $_SESSION['USER_FIRSTNAME']=$result['prenume'];
            $_SESSION['USER_LASTNAME']=$result['nume'];
            $_SESSION['USER_EMAIL']=$result['email'];
            $_SESSION['USER_PHONE']=$result['telefon'];
            $_SESSION['USER_P_CODE']=$result['cod_postal'];
            $_SESSION['USER_ADDR']=$result['adresa'];
            return true;
        }else{
            return false;
        }
    }


    public function __construct(){
        $this->init_database_conn();
    }

}








?>