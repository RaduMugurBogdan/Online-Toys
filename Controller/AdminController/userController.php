<?php

require_once 'homeController.php';
class UserController
{
    public function login()
    {
        if(isset($_POST['username'])&& isset($_POST['password']))
        {
            require_once './Model/admin_model/db_model.php';
            $db = new DBModel();
            $db->createConnection();
            $data = $db->verifyUser($_POST['username'],$_POST['password']);
            
            if($data->msg->type == "Succes")
            {
                return $data;
            }
            
            else
            {
                return '<strong>'.$data->msg->type.'! </strong> '.$data->msg->text;
            }
        }
    }
    
    public function invoke()
    {
        $result = $this->login();
        
        if(gettype($result) == "object")
        {
            $_SESSION['logged'] = true;
            $_SESSION['user'] = $result->data;
            $_SESSION['msg'] = $result->msg;
            
            $homectrl = new HomeController();
            $users = $homectrl->getTodayUsers();

            if ($users->msg->type == "Error") {
                $_SESSION['msg'] = $users->msg;
            }

            $usersNoi = $users->data;
            $tabelProduse = $homectrl->getTableProduse();
            $comenzi = $homectrl->getWeeklyComenzi();
            include './View/administrare/home_page/home_page.php';
        }
        else
        {
            include './View/administrare/admin_login_page/admin_login.php';
        }
    }
    
    public function getUserById($id_user)
    {   
        $db = new DBModel();
        $db->createConnection();
        $conn = $db->getConnection();
        try{
            $stmt = $conn->prepare('select * from users where id = :id');
            $stmt->bindParam(":id",$id_user);
            $stmt->execute();
                      
            $returnMsg = new Message();
            
            if ($stmt == FALSE) {
                $returnMsg->ErrorMessage("Eraore necunoscuta la preluarea userului din baza de date!", -1);
            } else {
                $user= $stmt->fetchObject('UserModel');
                
                if($user == NULL)
                {
                    $returnMsg->ErrorMessage("User inexistent!", -1);
                }
                else
                {
                    $returnMsg->SuccesMessage("Date aduse cu succes!", 0); 
                }
                              
            }
                
            
        } catch (Exception $ex) {
            $returnMsg->ErrorMessage($ex->getMessage(), (int) $ex->getCode());
        }
        
        $returnData = new Transporter($user,$returnMsg);
        return $returnData;
    }
   
}

