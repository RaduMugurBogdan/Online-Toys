<?php
if(isset($_SESSION)==false){
    session_start();
}

include './Model/database_model.php'; 
class FilterMode{
    private $conn=null;
    
    public function get_products($product_brand,$product_category,$material,$op_mode,$age_class,$rec_class){
        unset($_SESSION['product_brand']);
        unset($_SESSION['product_category']);
        unset($_SESSION['product_material']);
        unset($_SESSION['product_op_mode']);
        unset($_SESSION['product_age_class']);
        unset($_SESSION['product_rec_class']);

        $_SESSION['product_brand']=$product_brand;
        $_SESSION['product_category']=$product_category;
        $_SESSION['product_material']=$material;
        $_SESSION['product_op_mode']=$op_mode;
        $_SESSION['product_age_class']=$age_class;
        $_SESSION['product_rec_class']=$rec_class;


        $product_brand_request="";
        $product_category_request="";
        $product_material_request="";
        $product_op_mode_request="";
        $product_age_class_request="";
        $product_rec_class_request="";


    }
    
    
    public function __construct(){
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
    }
}




?>

