<?php
//url path starting from localhost
$request = $_SERVER['REQUEST_URI'];
$path= explode("/",$request);

switch ($path[3]) {
    case '' : 
        include './View/client_side/adv_page/adv_page.php';
        break;
    case 'home':{
        include './View/client_side/adv_page/adv_page.php';
        break;
    }
    case 'products' ://pagina de index
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
        include './Controller/ClientController/account_controller.php';
        new AccountController('account_config');
        break;    
    break;
    case 'visit_page': //pagina de vizita a unui client
        break;
    case 'favorite':
        break;
    default:
        //header("Location:".$request);
    break;
}