<?php


class DatabaseModel{
    private $conn=null;
    public function check_for_login($user_name,$password){
        $password=md5($password);
        try{
            $result=null;
            $sql_query="select id,prenume,trim(password) as p_word from users_table where email='{$user_name}'";
            $stmt=$this->conn->query($sql_query);
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            if($result){ 
                if($password==$result['p_word']){
                        $_SESSION['logged']=true;
                        $_SESSION['prenume']=$result['prenume'];
                        $_SESSION['id_user']=$result['id'];
                }else{
                    $_SESSION['login_wrong_pass']=true;
                    return false;
                }
            }else{
                $_SESSION['login_userna_not_found']=true;
                return false;
            }
            return true;
        }catch(Excetion $e){
            echo "problema la nivelul conexiunii cu baza de date";
        }
    }
    public function insert_new_account($user_email,$user_password,$user_fst_name,$user_sec_name,$user_phone,$postal_code,$user_address){
        try{
            $result=null;
            $sql_query="select id from users_table where email='{$user_email}'";
            $stmt=$this->conn->query($sql_query);
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            if($result==false){
                $user_password=md5($user_password);
                $sql_query="insert into users_table values(null,'{$user_email}','{$user_password}','{$user_sec_name}','{$user_fst_name}','{$user_phone}','{$postal_code}','{$user_address}')";
                $this->conn->prepare($sql_query)->execute();
                return true; 
            }else{
               $_SESSION['create_account_unable_email']=true;
               echo 'exista deja un cont cu aceasta adresa';
               return false; 
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
        //$this->check_for_login('radumugur1997@gmail.com','818574');
        $this->insert_new_account('radumugur28@yahoo.com','124658','Radu','Bogdan','07254984','102589','la colt');
    }
}


new DatabaseModel();

?>