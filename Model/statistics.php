<?php
if(isset($_SESSION)==false){
    session_start();
}
include './database_model.php';
class Statistics{
    private $conn=null;

    private function generate_csv($input_data){
        if($input_data==null){
            return null;
        }
        $csv_string="";
        for($i=0;$i<count($input_data);$i++){
            for($j=0;j<count($input_data[$i]);$j++){
                $csv_string=$csv_string.$input_data[$i][$j].";";
            }
            $csv_string=$csv_string."\n";
        }
        return $csv_string;
    }

    private function generate_pdf($input_data){

    }

    private function get_top_sellers(){
        if($this->conn==null){
            return null;
        }
        $query="SELECT NUME_BRAND,SUM(CANTITATE) AS P_VANDUTE FROM PRODUSE 
                JOIN PRODUSE_COMANDATE ON PRODUSE_COMANDATE.ID_PRODUS=PRODUSE.ID 
                JOIN BRAND_CATEGORIE_ASOC ON BRAND_CATEGORIE_ASOC.ID=PRODUSE.ID_PIVOT 
                JOIN BRANDURI ON BRANDURI.ID=BRAND_CATEGORIE_ASOC.ID_BRAND 
                GROUP BY NUME_BRAND
                ORDER BY P_VANDUTE DESC";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $results=$stmt->fetchAll();
        return $results; 
    }   

    private function get_best_product(){//nume_brand,nume_produs,nr_produse_vandute (numarul produselor de brandul si tipul mentionat)
        $query="SELECT NUME_BRAND,NUME_PRODUS,SUM(CANTITATE) AS P_VANDUTE FROM PRODUSE 
                JOIN PRODUSE_COMANDATE ON PRODUSE_COMANDATE.ID_PRODUS=PRODUSE.ID 
                JOIN BRAND_CATEGORIE_ASOC ON BRAND_CATEGORIE_ASOC.ID=PRODUSE.ID_PIVOT 
                JOIN BRANDURI ON BRANDURI.ID=BRAND_CATEGORIE_ASOC.ID_BRAND 
                GROUP BY NUME_BRAND,NUME_PRODUS
                ORDER BY P_VANDUTE DESC";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $results=$stmt->fetchAll();
        return $results; 
    }

    public function __construct(){
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
        //$this->get_top_sellers();
    }
}


new Statistics();


?>