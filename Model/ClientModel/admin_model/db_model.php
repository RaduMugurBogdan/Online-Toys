<?php
 
class DBModel
{
    private $conn;
    public function createConnection()
    {
        $dsn= "mysql:host=localhost;dbname=onlinetoys";
        $this->conn = new PDO($dsn, 'root', 'VTRStefan#');
    }
    
    public function getConnection()
    {
        return $this->conn;
    }
    
    public function verifyUser($username,$password)
    { 
        require_once 'Utils/transporter.php';
        require_once 'Utils/message.php';
        require_once 'user_model.php';  
        $userData = new UserModel();        
        try{
            $stmt = $this->conn->prepare('select id,username,password,email,phone,administrator from users where username = ? and password = ?');
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
                    $returnMsg->SuccesMessage("Autentificare cu succes!", 1);
                
                    $userData->Id = $user['id'];
                    $userData->Username = $user['username'];
                    $userData->Email = $user['email'];
                    $userData->Phone = $user['phone'];
                    $userData->Password = $user['password'];
                    $userData->Administrator = $user['administrator'];
                    
                    
                }
                
            }
        } catch (Exception $ex) {
            $returnMsg->ErrorMessage($ex->getMessage(), (int) $ex->getCode());
        }
        
        $returnData = new Transporter($userData,$returnMsg);
        return $returnData;
    }
}
