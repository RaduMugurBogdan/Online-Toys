<?php
if(isset($_SESSION)==false){
    session_start();
}


include './database_model.php';

class ProductsModel{
    private $conn=null;
    public function insert_product($product_name,$brand_name,$category_name,$price,$f_mode,$age_class,$material,$receiver_class){
        try{                
            $query="INSERT INTO BRAND_CATEGORIE_ASOC VALUES(NULL,(SELECT ID FROM BRANDURI WHERE NUME_BRAND='${brand_name}'),(SELECT ID FROM CATEGORII WHERE CATEGORIE='${category_name}'))";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
        }catch(PDOException $exception){
            //
        }catch(Exception $exception){
            //
        }
        $query="INSERT INTO PRODUSE(ID,NUME_PRODUS,BRAND_NAME,CATEGORY_NAME,PRET_PRODUS,MATERIAL,MOD_FUNC,VARSTA,DESTINATARI) 
                VALUES(NULL,'${product_name}','${brand_name}','${category_name}','${price}','${material}','${f_mode}','${age_class}','${receiver_class}')";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }
    public function get_brands(){
        $query="SELECT * FROM BRANDURI";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function insert_brand($brand_name){
        unset($_SESSION['new_brand_error']);
        $query="SELECT 1 FROM BRANDURI WHERE NUME_BRAND='${brand_name}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        if(empty($stmt->fetchAll())){
            $query="INSERT INTO BRANDURI(ID,NUME_BRAND) VALUES(NULL,'${brand_name}')";
            echo $query;
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
        }else{
            $_SESSION['new_brand_error']="The brand '${brand_name}' already exists";
            return false;
        }
    }

    public function delete_brand($brand_name){
        $query="DELETE FROM BRANDURI WHERE NUME_BRAND='${brand_name}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }

    public function delete_category($category_name){
        $query="DELETE FROM CATEGORII WHERE CATEGORIE='${category_name}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }
    
    public function insert_category($category_name){
        unset($_SESSION['new_category_error']);
        $query="SELECT 1 FROM CATEGORII WHERE CATEGORIE='${category_name}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        if(empty($stmt->fetchAll())){
            $query="INSERT INTO CATEGORII(ID,CATEGORIE) VALUES(NULL,'${category_name}')";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
        }else{
            $_SESSION['new_category_error']="The category '${category_name}' already exists.";
            return false;
        }
    }

    public function get_categories(){
        $query="SELECT * FROM CATEGORII";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function __construct(){
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
        //$this->get_top_sellers();
    }
}

$aux_object=new ProductsModel();
if(isset($_POST['insert_brand'])){
    $aux_object->insert_brand($_POST['insert_brand']);
    header('Location:http://localhost/ProiectTW/Online-Toys/admin');
    exit;
}


if(isset($_POST['delete_brand'])){
    $aux_object->delete_brand($_POST['delete_brand']);
    header('Location:http://localhost/ProiectTW/Online-Toys/admin');
    exit;
}


if(isset($_POST['insert_category'])){ 
    $aux_object->insert_category($_POST['insert_category']);
    header('Location:http://localhost/ProiectTW/Online-Toys/admin');
    exit;
}

if(isset($_POST['delete_category'])){
    $aux_object->delete_category($_POST['delete_category']);
    header('Location:http://localhost/ProiectTW/Online-Toys/admin');
    exit;
}

if(isset($_GET['action'])){
    unset($_SESSION['new_brand_error']);
    unset($_SESSION['new_category_error']);
    switch($_GET['action']){
        case 'get_brands':{
            echo json_encode($aux_object->get_brands());
            break;
        }
        case 'get_categories':{
            echo json_encode($aux_object->get_categories());   
            break;
        }
        default:{
            echo "";
        }
    }
    exit;
}




 
?>







