<?php
    include './account_con.php';
    unset($_SESSION['email_error']);
    unset($_SESSION['password_error']);
    unset($_SESSION['email_value']);
    unset($_SESSION['password_value']);
    $acc_conn=new AccountConnection();
    if(isset($_POST['email']) && isset($_POST['password'])){
        $_SESSION['email_value']=$_POST['email'];
        $_SESSION['password_value']=$_POST['password'];
        if($acc_conn->check_for_email($_POST['email'])==false){
            $_SESSION['email_error']="Unknown email";
            //redirect to login page
        }else{
            if($acc_conn->check_for_password($_POST['email'],$_POST['password'])==false){
                $_SESSION['password_error']='Wrong password';
                //redirect to login page 
            }else{
                //redirect to home page
            }
        }
    }
?>