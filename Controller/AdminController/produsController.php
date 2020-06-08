<?php
require_once './Model/admin_model/db_model.php';
require_once './Model/admin_model/produs_model.php';
class ProdusController
{
    public function getProdusById($produsId)
    {
        $db = new DBModel();
        $db->createConnection();
        $conn = $db->getConnection();
        
        try{
            $stmt = $conn->prepare('select * from produse where Id = ?');
            $stmt->execute([$produsId]);
            $produs = $stmt->fetchObject('ProdusModel');         
            $returnMsg = new Message();
            
            if ($produs == NULL) {
                $returnMsg->ErrorMessage("Eroare necunoscuta la preluarea produsului cu id-ul ".$produsId." din baza de date!", -1);
            } else {
                $returnMsg->SuccesMessage("Date aduse cu succes!", 0);             
            }
                
            
        } catch (Exception $ex) {
            $returnMsg->ErrorMessage($ex->getMessage(), (int) $ex->getCode());
        }
        
        $returnData = new Transporter($produs,$returnMsg);
        return $returnData;       
    }
    
    public function getAllProduse()
        {
        $db = new DBModel();
        $db->createConnection();
        $conn = $db->getConnection();
        
        try{
            $stmt = $conn->query('select * from produse');                      
            $returnMsg = new Message();
            
            if ($stmt == FALSE) {
                $returnMsg->ErrorMessage("Eroare necunoscuta la preluarea produselor din baza de date!", -1);
            } else {
                while($produs = $stmt->fetchObject('ProdusModel'))
                {
                    $produse[] = $produs;
                }
                           
            }
                          
        } catch (Exception $ex) {
            $returnMsg->ErrorMessage($ex->getMessage(), (int) $ex->getCode());
        }
        
        $returnData = new Transporter($produse,$returnMsg);
        return $returnData;  
    }
}

