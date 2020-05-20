<?php
require_once './Model/admin_model/user_model.php';
class LoginController
{
    public $model;
    public function __construct()
    {
        $this->model = new UserModel();
    }
    
    public function invoke()
    {
        $result = $this->model->login();
        
        if(gettype($result) == "object")
        {
            $_SESSION['logged'] = true;
            $_SESSION['user'] = $result;
            include './View/administrare/home_page/home_page.php';
        }
        else
        {
            include './View/administrare/admin_login_page/admin_login.php';
        }
    }
    
}
