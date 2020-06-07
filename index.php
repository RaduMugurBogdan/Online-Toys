<?php
//url path starting from localhost
$request = $_SERVER['REQUEST_URI'];
$path= explode("/",$request);
$path[3]=explode("?",$path[3])[0];


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
    case 'product_page': 
        include './Controller/ClientController/view_post_controller.php';
        (new ViewPostController())->access_product();
        break;
    case 'favorite':
        break;
    case 'admin':{
        //include './View/administrare/admin_brand_category/admin_bc.php';
        include './View/administrare/adaugare_produs2/add_prod.php';
        break;   
    }
    default:
        //header("Location:".$request);
    break;
}