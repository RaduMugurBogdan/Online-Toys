<?php
if(isset($_SESSION)==false){
    session_start();
}

class FilterModel{
    private $conn=null;
    
    public function get_products($product_brand,$product_category,$material,$op_mode,$age_class,$rec_class){
        unset($_SESSION['product_brand']);
        unset($_SESSION['product_category']);
        unset($_SESSION['product_material']);
        unset($_SESSION['product_op_mode']);
        unset($_SESSION['product_age_class']);
        unset($_SESSION['product_rec_class']);
      
        $filter_array=array();

        $filter_array[0]="";
        $filter_array[1]="";
        $filter_array[2]="";
        $filter_array[3]="";
        $filter_array[4]="";
        $filter_array[5]="";
        

        if(strcmp($product_brand,"Alege")!==0){
            $_SESSION['product_brand']=$product_brand;
            $filter_array[0]="UPPER(BRAND_NAME)=UPPER('${product_brand}')";    
        }
        if(strcmp($product_category,"Alege")!==0){
            $_SESSION['product_category']=$product_category;
            $filter_array[1]="UPPER(CATEGORY_NAME)=UPPER('${product_category}')";    
        }
        if(strcmp($material,"Alege")!==0){
            $_SESSION['product_material']=$material;
            $filter_array[2]="UPPER(MATERIAL)=UPPER('${material}')";    
        }
        if(strcmp($op_mode,"Alege")!==0){
            $_SESSION['product_op_mode']=$op_mode;
            $filter_array[3]="UPPER(MOD_FUNC)=UPPER('${op_mode}')";    
        }
        if(strcmp($age_class,"Alege")!==0){
            $_SESSION['product_age_class']=$age_class;
            $filter_array[4]="UPPER(VARSTA)=UPPER('${age_class}')";    
        }
        if(strcmp($rec_class,"Alege")!==0){
            $_SESSION['product_rec_class']=$rec_class;
            $filter_array[5]="UPPER(DESTINATARI)=UPPER('${rec_class}')";    
        }

        $filter_index=0;
        $final_request="";
        $and_prefix=true;

        while($filter_index<count($filter_array)){
            if($filter_array[$filter_index]!=="" ){
                if($and_prefix==false){
                    $final_request.=" AND ";
                }else{
                    $and_prefix=false;
                }
                $final_request.=" ".$filter_array[$filter_index]." ";
            }
            $filter_index++;
        }
        if($final_request!==""){
            $query="SELECT PRODUSE.ID AS product_id,nume_produs,poza,pret_produs FROM PRODUSE JOIN POZE_PRODUSE ON PRODUSE.ID=POZE_PRODUSE.ID_PRODUS WHERE ${final_request} GROUP BY PRODUSE.ID";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            unset($_SESSION['filter_results']);
            $_SESSION['filter_results']=$result;
        }

    }
    
    
    public function __construct(){
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
    }
}


if(isset($_POST['brand']) && isset($_POST['category']) && isset($_POST['material']) && isset($_POST['op_mode']) && isset($_POST['age_class']) && isset($_POST['receiver_class'])){
    include './database_model.php'; 
    $fm=new FilterModel();
    $fm->get_products($_POST['brand'],$_POST['category'],$_POST['material'],$_POST['op_mode'],$_POST['age_class'],$_POST['receiver_class']);
    header("Location:http://localhost/ProiectTW/Online-Toys/products"); 
    exit();
}


?>

