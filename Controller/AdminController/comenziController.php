<?php
if(isset($_SESSION)==false){
    session_start();
}

class ComenziController
{
   
    public function getComenzi()
    {
        require_once './Model/admin_model/db_model.php';
        require_once './Model/admin_model/comanda_model.php';
        $db = new DBModel();
        $db->createConnection();
        $conn = $db->getConnection();        
        try{
            $stmt = $conn->query('select id,id_client,DATE_FORMAT(data_com, "%d-%m-%Y") as data from comenzi');                      
            $returnMsg = new Message();
            
            if ($stmt == FALSE) {
                $returnMsg->ErrorMessage("Eraore necunoscuta la preluarea userului din baza de date!", -1);
            } else {
                while($comanda = $stmt->fetchObject('ComandaModel'))
                {
                    $comenzi[] = $comanda;
                }
                           
            }
                          
        } catch (Exception $ex) {
            $returnMsg->ErrorMessage($ex->getMessage(), (int) $ex->getCode());
        }
        
        $returnData = new Transporter($comenzi,$returnMsg);
        return $returnData;
    }
    
    //functie apelata dupa apelul axaj
    public function getProduseComandate($idComanda)
    {
        require_once './Utils/transporter.php';
        require_once './Utils/message.php';
        require_once './Model/admin_model/produs_comandat_model.php';
        require_once './Controller/AdminController/produsController.php';

        
        $db = new DBModel();
        $db->createConnection();
        $conn = $db->getConnection(); 
        $produsCtrl = new ProdusController();
        $produse = array();
        try{
            $stmt = $conn->prepare('select id_produs,cantitate from produse_comandate where id_comanda=:idComanda');        
            $stmt->bindParam(":idComanda",$idComanda);
            $stmt->execute();

            $returnMsg = new Message();
            
            if ($stmt == FALSE) {
                $returnMsg->ErrorMessage("Eroare necunoscuta la preluarea userului din baza de date!", -1);
            } else {
                while($produsComandat = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    $produsView = new ProdusComandatModel();
                    $produsData = $produsCtrl->getProdusById($produsComandat["id_produs"]);
                    $produsView->Denumire = $produsData->data->Denumire;
                    $produsView->CantitateComandata = $produsComandat["cantitate"];
                    $produsView->Producator = $produsData->data->Producator;
                    $produsView->PretTotal = $produsData->data->Pret_Buc * $produsView->CantitateComandata;
                    $produse[] = $produsView;
                }
                           
            }
                          
        } catch (Exception $ex) {
            $returnMsg->ErrorMessage($ex->getMessage(), (int) $ex->getCode());
        }
        
        $returnData = new Transporter($produse,$returnMsg);
        return $returnData;
    }
    
    public function createTableView()
    {
        require_once './Model/admin_model/db_model.php';
        require_once './Utils/transporter.php';
        require_once './Utils/message.php';
        require_once './Model/admin_model/user_model.php';
        require_once './Controller/AdminController/userController.php';
        
        $db = new DBModel();
        $db->createConnection();
        $conn = $db->getConnection(); 
        $comenzi = $this->getComenzi();
        if($comenzi->msg->type == "Error")
        {
            $_SESSION['msg'] = $comenzi->msg;
        }
        
        if($comenzi->msg->type == "Error")
        {
            $_SESSION['msg'] = $comenzi->msg;
        }
        

        $userCtrl = new UserController();
        
        $template = '<tr>'
                . '<th>Username</th>'
                . '<th>Data Comanda</th>'
                . '<th>Detalii</th>'
                . '</tr>';
        
        foreach($comenzi->data as $comanda)
        {
            $user = $userCtrl->getUserById($comanda->id_client);
            $produseIds = $this->getProduseComandate($comanda->id);
            if($user->msg->type == "Error")
            {
                $_SESSION['msg'] = $user->msg;
            }
            
            $row = '<tr class="lng-comenzi">'
                    . '<td>'.$user->data->Username.'</td>'
                    . '<td>'.$comanda->data.'</td>'
                    . '<td><button class="lng-btn" onclick=\'showOrder('.json_encode($produseIds->data).','.json_encode($user->data).')\'>Vizualizare</button></td>'
                    . '</tr>';
            $template=$template.$row;
        }
        return $template;
    }   
    
}

//if(isset($_GET['action']))
//{
//    
//    switch ($_GET['action']){
//        case 'get_order':
//            
//            $comenziCtrl = new ComenziController();    
////            require_once '../../Utils/transporter.php';
////            require_once '../../Utils/message.php';
//            require_once '../../Controller/AdminController/userController.php';
//            echo $_GET['user'];
//            break;
//            
//    }
//    exit();
//}

