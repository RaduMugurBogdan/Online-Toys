<?php

class ReclamaModel{
    private $conn=null;

    public function insert_adv($quote,$picture){
        if($this->conn==null){
            return null;
        }
        $query="INSERT INTO RECLAME(ID,RECLAMA,POZA) VALUES (NULL, '${quote}','${picture}')"; 
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }

    public function delete_adv($reclama_id){
        if($this->conn==null){
            return null;
        }
        $query="DELETE FROM RECLAME WHERE ID='${reclama_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }   

    public function get_all_adv(){
        if($this->conn==null){
            return null;
        }
        $query="SELECT * FROM RECLAME";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }

    public function __contruct(){
        include './Model/database_model.php';
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
    }
}


if(isset($_POST['action'])){
    $aux_object=new ReclamaModel();
    switch($_POST['action']){
        case 'insert_adv':{
            if(isset($_POST['rec_quote']) && isset($_POST['rec_picture'])){
                $aux_object->insert_adv($_POST['req_quote'],$_POST['rec_picture']);
            }
            break;
        }
        case 'delete_adv':{
            if(isset($_POST['rec_id'])){
                $aux_object->delete_adv($_POST['rec_id']);
            }
            break;
        }
        case 'get_all_adv':{
            $ret_content=json_encode($aux_object->get_all_adv());
            header("Content-type:application/json");
            echo $ret_content;
            exit;
        }
    }
}





?>


