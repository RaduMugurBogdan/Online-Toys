<?php
if(isset($_SESSION)==false){
    session_start();
}

class AdvModel{
    private $conn=null;

    public function insert_adv($adv_quote,$adv_picture){
        $adv_picture=addslashes(file_get_contents($adv_picture['tmp_name']));
        $query="INSERT INTO RECLAME(ID,RECLAMA,POZA) VALUES (NULL,'${adv_quote}','${adv_picture}')";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }
    public function delete_adv($adv_id){
        $query="DELETE FROM RECLAME WHERE ID='${adv_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }

    public function get_advs(){
        $query="SELECT * FROM RECLAME";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function __construct(){
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
    }
}





if(isset($_GET['action'])){
    include './database_model.php';
    $adv_object=new AdvModel();
    switch($_GET['action']){
        case 'insert_adv':{         
            if(isset($_POST['adv_quote']) && isset($_FILES['adv_picture'])){
                $adv_object->insert_adv($_POST['adv_quote'],$_FILES['adv_picture']);
            }
            header("Location:http://localhost/ProiectTW/Online-Toys/admin/add_adv");
            exit;
        }
        case 'delete_adv':{
            if(isset($_GET['adv_id'])){
                $adv_object->delete_adv($_GET['adv_id']);
            }
            header("Location:http://localhost/ProiectTW/Online-Toys/admin/add_adv");
            exit;
        } 
    }
}


?>