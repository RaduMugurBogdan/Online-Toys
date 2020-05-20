<?php
require_once './Utils/message.php';
class DBModel
{
    private $conn;
    public function createConnection()
    {
        $dsn= "mysql:host=localhost;dbname=onlinetoys";
        $msg = new Message();
        try{
            $this->conn = new PDO($dsn, 'root', 'VTRStefan#');
            $msg->SuccesMessage("Ne-am conectat", 1);
        } catch (\PDOException $ex) {
            $msg->ErrorMessage($ex->getMessage(), (int)$ex->getCode());
        }
        return $msg;
    }
    
    public function verifyUser($username,$password)
    {
        require_once 'user_model.php';
        require_once './Utils/transporter.php';
        $userData = new UserModel();
        try{
            $stmt = $this->conn->prepare('select id,username,email,phone,administrator from users where username = ? and password = ?');
            $stmt->execute([$username, $password]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $returnMsg = new Message();
            
            if ($user == null) {
                $returnMsg->ErrorMessage("Username sau parola incorecte", -1);
            } else {
                
                if($user['administrator'] == 0)
                {
                    $returnMsg->ErrorMessage("Nu aveti drepturi sa folositi aceasta aplicatie", -1);
                }
                else
                {
                    $returnMsg->SuccesMessage("User gasit", 1);
                
                    $userData->id = $user['id'];
                    $userData->username = $user['username'];
                    $userData->email = $user['email'];
                    $userData->phone = $user['phone'];
                    
                }
                
            }
        } catch (Exception $ex) {
            $returnMsg->ErrorMessage($ex->getMessage(), (int) $ex->getCode());
        }
        
        $returnData = new Transporter($userData,$returnMsg);
        return $returnData;
    }   
}
