<?php
require_once 'db_model.php';
class UserModel extends DBModel
{
    public $id;
    public $username;
    public $email;
    public $phone;
    
    public function __construct() {
        $this->id = 0;
        $this->username = " ";
        $this->email=" ";
        $this->phone=" ";
    }
    
    public function login()
    {
        if(isset($_POST['username'])&& isset($_POST['password']))
        {
            $this->createConnection();
            $data = $this->verifyUser($_POST['username'],$_POST['password']);
            
            
            if($data->msg->type == "Succes")
            {
                $_SESSION['logged']=true;
                return $data->data;
            }
            
            else
            {
                return '<strong>'.$data->msg->type.'! </strong> '.$data->msg->text;
            }
        }
    }
}
