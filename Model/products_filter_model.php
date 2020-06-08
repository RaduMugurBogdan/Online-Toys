<?php

class FilterClass{
    private $conn=null;
    public function get_brands(){
        if($this->conn==null){
            return null;
        }
        $query="SELECT NUME_BRAND FROM BRANDURI";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_categories($brand_name){
        if($conn==null || $brand_name==null){
            return null;
        }
        $query="SELECT * FROM BRANDURI JOIN BRANDURO_CATEGORIE_ASOC BCA ON BRANDURI.ID=BCA.ID_BRAND JOIN CATEGORII ON CATEGORII.ID=BCA.ID_CATEGORIE WHERE NUME_BRAND='${brand_name}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function get_material($brand_name,$category_name){
        if($conn==null || $brand_name==null){
            return null;
        }
        $category_seq="";
        if(category_name!=null){
            $category_seq="AND CATEGORIE='${category_name}'";
        }
        $query="SELECT * FROM BRANDURI 
                         JOIN BRANDURO_CATEGORIE_ASOC BCA ON BRANDURI.ID=BCA.ID_BRAND 
                         JOIN CATEGORII ON CATEGORII.ID=BCA.ID_CATEGORIE 
                         JOIN PRODUSE ON PRODUSE.ID_PIVOT=BCA.ID 
                         WHERE NUME_BRAND='${brand_name}' ${category_seq}";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);

    }

    public function __construct(){
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
    }
}



?>