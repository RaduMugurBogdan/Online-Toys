<?php
if(!isset($_SESSION)){
    session_start();
}

class OrdersModel{
    private $conn=null;
    /**
     * 
     * functia care insereaza o noua comanda in tabela comenzi
     * date necesare:
     * ->client_id = este id-ul clientului care efectueaza comanda
     * ->products  = tabela ce retine toate produsele ccomandate su urmatoarea forma
     *                
     *      products_array[i][product_id]=1 
     *      products_array[i][amount]=1
     *      -----------------------------------------------------------------------
     *      i este numarul produsului ales
     *      products_array[i][product_id] este id-ul produsului i
     *      products_array[i][amount] este numarul de obiecte de tipul i (cantitatea)
     */
    public function insert_order($client_id,$products){
        if($this->conn==null || empty($products)==true){
            return false;
        }
        $query="INSERT INTO COMENZI (ID,ID_CLIENT,DATA_COM,LIVRAT) VALUE (NULL,'${client_id}',SYSDATE(),0)";
        $stmt=$this->conn->exec($query);
        $order_id=$this->conn->lastInsertId();
        for($i=0;$i<count($products);$i++){
            $product_id=$products[$i]['product_id'];
            $amount=$products[$i]['amount'];
            $query="INSERT INTO PRODUSE_COMANDATE(ID,ID_COMANDA,ID_PRODUS,CANTITATE) VALUES(null,'${order_id}','${product_id}','${amount}')";
            $this->conn->exec($query);
        }
        return true;
    }
    /**
     * functia returneaza toate produsele asociate comenzii date ca parametru
     * 
     * 
     * 
     */
    public function get_ordered_products($order_id){
        if($this->conn==null){
            return false;
        }else{
            $query="SELECT * FROM PRODUSE_COMANDATE WHERE ID_COMANDA='${order_id}'";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    /**
     * functia care returneaza toate comenzile ce nu au fost onorate
     * 
     * 
     */
    public function get_all_valid_orders(){
        if($this->conn==null){
            return false;
        }else{
            $query='SELECT * FROM COMENZI WHERE LIVRAT=0';
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    
    /**
     * functia care returneaza toate comenzile ce au fost onorate
     * 
     * 
     */
    public function get_all_served_orders(){
        if($this->conn==null){
            return false;
        }else{
            $query='SELECT * FROM COMENZI WHERE LIVRAT!=0 ';
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function __construct(){
        include './database_model.php';
        $db = new DatabaseModel();
        $this->conn=$db->get_db_conn();
    }


}


/*
$aux=new OrdersModel();

$products_array=array();
$products_array[0]['product_id']=1;
$products_array[0]['amount']=1;

//echo count($products_array);
$aux->insert_order(1,$products_array);

//echo "<pre>";
//print_r ($aux->get_all_served_orders());
//print_r ($aux->get_all_valid_orders());
//print_r ($aux->get_ordered_products(36));
*/
?>