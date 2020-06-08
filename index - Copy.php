<?php
//url path starting from localhost
$request = $_SERVER['REQUEST_URI'];
$path= explode("/",$request);

switch ($path[2]) {
    case 'index.php' :
        include './View/client_side/main_frame/frame.php';
        break;
    case 'home' ://pagina de index
        include './View/client_side/main_frame/frame.php';
        break;
    case 'login': //proces de login
        include './Controller/ClientController/account_controller.php';
        new AccountController('login');
        break;
    case 'create_account'://creare cont
        include './Controller/ClientController/account_controller.php';
        new AccountController('create_account');
        break;
    case 'account_config': //modificare cont(postari proprii,lista de favorite,modificare date de contact si date credentiale)
        break;
        break;
    case 'visit_page': //pagina de vizita a unui client
        break;
    case 'favorite':
        break;

    case 'admin':
        include './Controller/AdminController/userController.php';
        $user_ctrl = new UserController;
        $user_ctrl->invoke();       
        break;
    case 'admin-home':        
        include './Controller/AdminController/homeController.php';
        $homectrl = new HomeController();
        $users = $homectrl->getTodayUsers();
        
        if($users->msg->type == "Error")
        {
            $_SESSION['msg'] = $users->msg;
        }
        
        $usersNoi = $users->data;
        $tabelProduse = $homectrl->getTableProduse();
        $comenzi = $homectrl->getWeeklyComenzi();
        include './View/administrare/home_page/home_page.php';
        break;
    case 'admin-comenzi':
        //include './View/administrare/comenzi/comenzi.php';
       include './Controller/AdminController/comenziController.php';
       $comenziCtrl = new ComenziController();       
       $template = $comenziCtrl->createTableView();
       include './View/administrare/comenzi/comenzi.php';
       break;
    default:
        //header("Location:".$request);
        break;
}


