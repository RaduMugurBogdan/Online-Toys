<?php

class HomeController{
    
    public function getTodayUsers(){
        require_once './Model/admin_model/db_model.php';
        require_once './Utils/message.php';
        require_once './Utils/transporter.php';
        $db = new DBModel();
        $db->createConnection();
        $conn = $db->getConnection();
        try{
            $stmt = $conn->prepare('select count(*) as utilizatori from users where data_inregistrarii = (select curdate())');
            $stmt->execute();
                      
            $returnMsg = new Message();
            
            if ($stmt == FALSE) {
                $returnMsg->ErrorMessage("Eraore necunoscuta la preluarea utilizatorilor noi inregistrati din baza de date!", -1);
            } else {
                $users = $stmt->fetchColumn(0);
                
                if($users == NULL)
                {
                    $returnMsg->ErrorMessage("User inexistent!", -1);
                }
                else
                {
                    $returnMsg->SuccesMessage("Date aduse cu succes!", 0); 
                }
                              
            }
                
            
        } catch (Exception $ex) {
            $returnMsg->ErrorMessage($ex->getMessage(), (int) $ex->getCode());
        }
        
        $returnData = new Transporter($users,$returnMsg);
        return $returnData;
    }
    
    public function getTableProduse()
    {
        require_once './Model/admin_model/db_model.php';
        require_once 'produsController.php';
        $produsCtrl = new ProdusController;
        
        $produseData = $produsCtrl->getAllProduse();
        
        $template = '<tr>
                    <th>Produs</th>
                    <th>Cantitate</th>
                    <th>Pret</th>
                    <th>Producator</th>
                </tr>';
        
        if($produseData->msg->type == "Error")
        {
            $_SESSION['msg']=$produseData->msg;
        }
        
        $produse = $produseData->data;
        
        foreach($produse as $produs)
        {
            $row='<tr class="produs">'
                    . '<td>'.$produs->Denumire.'</td>'
                    . '<td>'.$produs->Cantitate.'</td>'
                    . '<td>'.$produs->Pret_Buc.'</td>'
                    . '<td>'.$produs->Producator.'</td>'
                    . '</tr>';
            $template = $template.$row;
        }
        return $template;
    }
    
//    select count(*) from comenzi where DAYOFWEEK(data_com)-1=1 AND WEEK(data_com)=WEEK(CURRENT_DATE);
//    select count(*) from comenzi where DAYOFWEEK(data_com)-1=2 AND WEEK(data_com)=WEEK(CURRENT_DATE);
//    select count(*) from comenzi where DAYOFWEEK(data_com)-1=3 AND WEEK(data_com)=WEEK(CURRENT_DATE);
//    select count(*) from comenzi where DAYOFWEEK(data_com)-1=4 AND WEEK(data_com)=WEEK(CURRENT_DATE);
//    select count(*) from comenzi where DAYOFWEEK(data_com)-1=5 AND WEEK(data_com)=WEEK(CURRENT_DATE);
//    select count(*) from comenzi where DAYOFWEEK(data_com)-1=6 AND WEEK(data_com)=WEEK(CURRENT_DATE);
//    select count(*) from comenzi where DAYOFWEEK(data_com)-1=0 AND WEEK(data_com)=WEEK(CURRENT_DATE);
    
//    $day=0-duminica;
//    $day=1-luni;
//    $day=2-marti;
//    $day=3-miercuri;
//    $day=4-joi;
//    $day=5-vineri;
//    $day=6-sambata;
    public function getComenziByDayOfWeek($day){
        $db = new DBModel();
        $db->createConnection();
        $conn = $db->getConnection();
        try{
            $stmt = $conn->prepare('select count(*) from comenzi where DAYOFWEEK(data_com)-1=:day AND WEEK(data_com)=WEEK(CURRENT_DATE);');
            $stmt->bindParam(":day",$day);
            $stmt->execute();
                      
            $returnMsg = new Message();
            
            if ($stmt == FALSE) {
                $returnMsg->ErrorMessage("Eraore necunoscuta la preluarea comenzilor din baza de date!", -1);
            } else {
                $countComenzi = $stmt->fetchColumn(0);
               
                $returnMsg->SuccesMessage("Date aduse cu succes!", 0);                 
                              
            }               
            
        } catch (Exception $ex) {
            $returnMsg->ErrorMessage($ex->getMessage(), (int) $ex->getCode());
        }
        
        $returnData = new Transporter($countComenzi,$returnMsg);
        return $returnData;
    }
    
    public function getWeeklyComenzi()
    {
        for($i = 0;$i<=6;$i++)
        {
            $comenzi[$i] = $this->getComenziByDayOfWeek($i);
        }
        
        return $comenzi;
    }
    
}

if(isset($_GET['action']))
{
    switch ($_GET['action']){
        case 'get_weekly_comenzi':
            
            $homeCtrl = new HomeController();
            require_once '../../Model/admin_model/db_model.php';
            require_once '../../Utils/message.php';
            require_once '../../Utils/transporter.php';
            echo json_encode($homeCtrl->getWeeklyComenzi());
            break;
            
    }
    exit();
}
