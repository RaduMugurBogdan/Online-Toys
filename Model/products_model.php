<?php
if(isset($_SESSION)==false){
    session_start();
}


class ProductsModel{
    private $conn=null;
    private $age_classes=null;
    private $op_mode=null;
    private $material_classes=null;
    private $receiver_classes=null;

    public function get_age_classes(){
        return $this->age_classes;
    }
    public function get_op_mode(){
        return $this->op_mode;
    }
    public function get_material_classes(){
        return $this->material_classes;
    }
    public function get_receiver_classes(){
        return $this->receiver_classes;
    }

    private function init_classes(){
        $this->age_classes=['3-6 luni','6-9 luni','9-12 luni','1-2 ani','2-3 ani','3-6 ani','6-9 ani','9+ ani'];
        $this->op_mode=['Electrice','Mecanice','Simple'];
        $this->receiver_classes=['Baieti','Fete','Unisex'];
        $this->material_classes=['Plus si Textile','Plastic','Lemn','Metal'];
    }
    public function insert_product($product_name,$brand_name,$category_name,$price,$f_mode,$age_class,$material,$receiver_class){
        unset($_SESSION['product_name_error']);

        unset($_SESSION['product_name']);
        unset($_SESSION['brand_name']);
        unset($_SESSION['category_name']);
        unset($_SESSION['price']);
        unset($_SESSION['f_mode']);
        unset($_SESSION['age_class']);
        unset($_SESSION['material']);
        unset($_SESSION['receiver_class']);

        try{
            $query="SELECT 1 FROM PRODUSE WHERE NUME_PRODUS='${product_name}'";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll();
            if(empty($result)==false){
                $_SESSION['product_name_error']="The product name already exists.";
                
                $_SESSION['product_name']=$product_name;
                $_SESSION['brand_name']=$brand_name;
                $_SESSION['category_name']=$category_name;
                $_SESSION['price']=$price;
                $_SESSION['f_mode']=$f_mode;
                $_SESSION['age_class']=$age_class;
                $_SESSION['material']=$material;
                $_SESSION['receiver_class']=$receiver_class;
                header("Location:http://localhost/ProiectTW/Online-Toys/admin");//redirect to add_product page
            }


            $query="INSERT INTO PRODUSE(ID,NUME_PRODUS,BRAND_NAME,CATEGORY_NAME,PRET_PRODUS,MATERIAL,MOD_FUNC,VARSTA,DESTINATARI) 
            VALUES(NULL,'${product_name}','${brand_name}','${category_name}','${price}','${material}','${f_mode}','${age_class}','${receiver_class}')";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();

            $query="INSERT INTO BRAND_CATEGORIE_ASOC VALUES(NULL,(SELECT ID FROM BRANDURI WHERE NUME_BRAND='${brand_name}'),(SELECT ID FROM CATEGORII WHERE CATEGORIE='${category_name}'))";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $last_product_id=$this->conn->lastInsertId();
            
            for($i=0;$i<count($_FILES['product_pictures']['name']);$i++){
                $picture_content=addslashes(file_get_contents($_FILES['product_pictures']['tmp_name'][$i]));
                $query="INSERT INTO POZE_PRODUSE(ID,ID_PRODUS,POZA) VALUES(NULL,'${last_product_id}','${picture_content}')";
                $stmt=$this->conn->prepare($query);
                $stmt->execute();
            }

        }catch(PDOException $exception){
            //
        }catch(Exception $exception){
            //
        }
      
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
    public function product_exists($product_id){
        $query="SELECT * FROM PRODUSE WHERE ID='${product_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)==false){
            return true;
        }
        return false;
    }

    public function get_product_by_id($product_id){
        unset($_SESSION['product_data']);
        unset($_SESSION['product_pictures']);
        $query="SELECT * FROM PRODUSE WHERE ID='${product_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)==false){
            $_SESSION['product_data']=$result;
        }
        $query="SELECT * FROM POZE_PRODUSE WHERE ID_PRODUS='${product_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)==false){
            $_SESSION['product_pictures']=$result;
        }
    }
    public function __construct(){
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
        $this->init_classes();
    }
}


if(isset($_POST['product_name']) && isset($_POST['product_brand']) && isset($_POST['product_price']) && isset($_POST['product_category']) && isset($_POST['product_material']) && isset($_POST['op_mode']) && isset($_POST['age_class']) && isset($_POST['product_receiver']) && isset($_FILES['product_pictures'])){
    include './database_model.php';
    $aux_object=new ProductsModel();
    $aux_object->insert_product($_POST['product_name'],$_POST['product_brand'],$_POST['product_category'],$_POST['product_price'],$_POST['op_mode'],$_POST['age_class'],$_POST['product_material'],$_POST['product_receiver']);
    header("Location:http://localhost/ProiectTW/Online-Toys/admin");
    exit();
}

if(isset($_POST['insert_brand'])){
    include './database_model.php';
    $aux_object=new ProductsModel();
    $aux_object->insert_brand($_POST['insert_brand']);
    header('Location:http://localhost/ProiectTW/Online-Toys/admin');
    exit;
}


if(isset($_POST['delete_brand'])){
    include './database_model.php';
    $aux_object=new ProductsModel();
    $aux_object->delete_brand($_POST['delete_brand']);
    header('Location:http://localhost/ProiectTW/Online-Toys/admin');
    exit;
}


if(isset($_POST['insert_category'])){
    include './database_model.php';
    $aux_object=new ProductsModel(); 
    $aux_object->insert_category($_POST['insert_category']);
    header('Location:http://localhost/ProiectTW/Online-Toys/admin');
    exit;
}

if(isset($_POST['delete_category'])){
    include './database_model.php';
    $aux_object=new ProductsModel();
    $aux_object->delete_category($_POST['delete_category']);
    header('Location:http://localhost/ProiectTW/Online-Toys/admin');
    exit;
}

if(isset($_GET['action'])){
    include './database_model.php';
    $aux_object=new ProductsModel();
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
    unset($_GET);
    exit;
}
 
?>







