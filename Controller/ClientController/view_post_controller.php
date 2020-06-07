<?php
if(isset($_SESSION)==false){
    session_start();
}
class ViewPostController{

    public function access_product(){
        include './Model/database_model.php';
        include './Model/products_model.php';
        $pm=new ProductsModel();
        if(isset($_GET['product_id']) &&  $pm->product_exists($_GET['product_id'])){
            $pm->get_product_by_id($_GET['product_id']);
            include './View/client_side/product_page_view/product_page_view.php';    
        }else{
            echo "ASdasdadasdas";
            die();
        }
    }
    public function __costruct(){
        
    }
}


?>