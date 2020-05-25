<?php
if(isset($_SESSION)==false){
    session_start();
}
class AccountController{
    private function perform_login(){
        if(isset($_SESSION['log_email'])){
            include './View/client_side/main_frame/frame.php';
        }else{
            include './View/client_side/login_page/login_page.php';
        }
    }   
    private function perform_account_creation(){
        if(isset($_SESSION['log_email'])){
            include './View/client_side/main_frame/frame.php';
        }else{
            include './View/client_side/create_acc_page/create_acc_page.php';
        }
    }
    private function access_account_page(){
        if(isset($_SESSION['log_email'])){
            include './View/client_side/account_config/config.php';
        }else{
            include './View/client_side/login_page/login_page.php';
        }
    }
    public function __construct($action){
        switch($action){
            case 'login':{
                $this->perform_login();
                break;
            }
            case 'create_account':{
                $this->perform_account_creation();
                break;
            }
            case 'account_config':{
                $this->access_account_page();
                break;
            }
        }
    }
}




?>