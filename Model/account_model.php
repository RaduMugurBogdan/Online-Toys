<?php
if(isset($_SESSION)==false){
    session_start();
}

class AccountModel{
    private $conn=null;
    private function check_valid_login($email,$password){
        unset($_SESSION['email_error']);
        unset($_SESSION['pass_error']);
        unset($_SESSION['email_value']);
        $query="SELECT password FROM USERS_TABLE WHERE EMAIL='${email}'";
        $stmt=$this->conn->query($query);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        if($result==false){
            $_SESSION['email_error']="Email not found";
        }else if(md5($password)!==$result['password']){
            $_SESSION['pass_error']="The password is wrong";
        }else{
            return true;
        }
        $_SESSION['email_value']=$email;
        return false;
    }
    public function perform_login($email,$password){
        if($this->check_valid_login($email,$password)){//credentialele sunt valide
            echo 'login performed';
            //configure session for logged user
            //header("Location:Online-Toys/home");
        }else{
            echo 'login failed';
            //header("Location:Online-Toys/login");
        }
    }

    private function check_valid_account(){
        unset($_SESSION['user_email']);
        unset($_SESSION['user_password']);
        unset($_SESSION['user_conf_password']);
        unset($_SESSION['user_first_name']);
        unset($_SESSION['user_last_name']);
        unset($_SESSION['user_phone']);
        unset($_SESSION['user_county']);
        unset($_SESSION['user_town']);
        unset($_SESSION['user_postal_code']);
        unset($_SESSION['user_details']);
        
        if(isset($_POST['email'])){
            $_SESSION['user_email']=$_POST['email'];
        }
        if(isset($_POST['password'])){
            $_SESSION['password']=$_POST['user_password'];
        }
        if(isset($_POST['conf_password'])){
            $_SESSION['user_conf_password']=$_POST['conf_password'];
        }
        if(isset($_POST['first_name'])){
            $_SESSION['user_first_name']=$_POST['first_name'];
        }
        if(isset($_POST['last_name'])){
            $_SESSION['user_last_name']=$_POST['last_name'];
        }
        if(isset($_POST['phone'])){
            $_SESSION['user_phone']=$_POST['phone'];
        }
        if(isset($_POST['county'])){
            $_SESSION['user_county']=$_POST['county'];
        }
        if(isset($_POST['town'])){   
            $_SESSION['user_town']=$_POST['town'];
        }
        if(isset($_POST['postal_code'])){
            $_SESSION['user_postal_code']=$_POST['postal_code'];
        }
        if(isset($_POST['details'])){
            $_SESSION['user_details']=$_POST['details'];   
        }
        $user_email=$_POST['email'];
        $query="SELECT 1 FROM USERS_TABLE WHERE EMAIL='${user_email}'";
        $stmt=$this->conn->query($query);
        $result=$stmt->fetch();
        if($result==false){
            return false;
        }
        return true;
    }

    public function perform_account_creation(){
        if(check_valid_account()){
            //init session user  
            //redirect to home page
        }else{
            //redirect to login page
        }
    }

    public function __construct(){
        include 'database_model.php';
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
    }
}

if(isset($_GET['action'])){
    $aux_acc=new AccountModel();
    switch($_GET['action']){
        case 'login':{
            if(isset($_POST['email']) && isset($_POST['password'])){
                $aux_acc->perform_login($_POST['email'],$_POST['password']);
            }else{
                //redirect to error page
            }
            break;
        }
        case 'create_account':{
            break;
        }
        default:{
            //redirect to error page
        }
    }
}

?>