<?php
if(isset($_SESSION)==false){
    session_start();
}

class AccountModel{
    private $conn=null;
    private function check_valid_login($email,$password){
        /***********************************************/
        //variabilele necesare pentru retinerea informatiilor clientului curent
        unset($_SESSION['log_email']);
        unset($_SESSION['log_phone']);
        unset($_SESSION['log_user_first_name']);
        unset($_SESSION['log_user_last_name']);
        unset($_SESSION['log_county']);
        unset($_SESSION['log_town']);
        unset($_SESSION['log_details']);
        /***************************************************/


        unset($_SESSION['email_error']);
        unset($_SESSION['pass_error']);
        unset($_SESSION['email_value']);
        $query="SELECT * FROM USERS_TABLE WHERE EMAIL='${email}'";
        $stmt=$this->conn->query($query);
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        if($result==false){
            $_SESSION['email_error']="Email not found";
        }else if(md5($password)!==$result['password']){
            $_SESSION['pass_error']="The password is wrong";
        }else{
            $_SESSION['log_email']=$result['EMAIL'];
            $_SESSION['log_phone']=$result['PHONE'];
            $_SESSION['log_user_first_name']=$result['PRENUME'];
            $_SESSION['log_user_last_name']=$result['NUME'];
            $_SESSION['log_county']=$result['JUDET'];
            $_SESSION['log_town']=$result['LOCALITATE'];
            $_SESSION['log_details']=$result['DETALII'];
            return true;
        }
        $_SESSION['email_value']=$email;
        return false;
    }
    public function perform_login($email,$password){
        if($this->check_valid_login($email,$password)){
            header("Location:http://localhost/ProiectTW/Online-Toys/home");
        }else{
            header("Location:http://localhost/ProiectTW/Online-Toys/login");
        }
    }

    private function check_valid_account(){
        /***********************************************/
        //variabilele necesare pentru retinerea informatiilor clientului curent
        unset($_SESSION['log_email']);
        unset($_SESSION['log_phone']);
        unset($_SESSION['log_user_first_name']);
        unset($_SESSION['log_user_last_name']);
        unset($_SESSION['log_county']);
        unset($_SESSION['log_town']);
        unset($_SESSION['log_details']);
        /***************************************************/

        unset($_SESSION['user_email']);
        unset($_SESSION['user_password']);
        unset($_SESSION['user_conf_password']);
        unset($_SESSION['user_first_name']);
        unset($_SESSION['user_last_name']);
        unset($_SESSION['user_phone']);
        unset($_SESSION['user_county']);
        unset($_SESSION['user_town']);
        unset($_SESSION['user_details']);
        unset($_SESSION['email_error']);
        
        if(isset($_POST['email'])){
            $_SESSION['user_email']=$_POST['email'];
        }
        if(isset($_POST['password'])){
            $_SESSION['user_password']=$_POST['password'];
        }
        if(isset($_POST['conf_password'])){
            $_SESSION['user_conf_password']=$_POST['conf_password'];
        }
        if(isset($_POST['first_name'])){
            $_SESSION['user_first_name']=$_POST['first_name'];
        }
        if(isset($_POST['last_name'])){
            $_SESSION['user_last_name']=$_POST['last_name'];
        }
        if(isset($_POST['phone'])){
            $_SESSION['user_phone']=$_POST['phone'];
        }
        if(isset($_POST['county'])){
            $_SESSION['user_county']=$_POST['county'];
        }
        if(isset($_POST['town'])){   
            $_SESSION['user_town']=$_POST['town'];
        }
        if(isset($_POST['details'])){
            $_SESSION['user_details']=$_POST['details'];   
        }
        $user_email=$_POST['email'];
        $query="SELECT 1 FROM USERS_TABLE WHERE EMAIL='${user_email}'";
        $stmt=$this->conn->query($query);
        $result=$stmt->fetch();
        if($result!=false){
            $_SESSION['email_error']="The email is already used";
            return false;
        }else{
            $email=$_SESSION['user_email'];
            $password=md5($_SESSION['user_password']);
            $first_name=$_SESSION['user_last_name'];
            $last_name=$_SESSION['user_first_name'];
            $phone=$_SESSION['user_phone'];
            $county=$_SESSION['user_county'];
            $town=$_SESSION['user_town'];
            $details=$_SESSION['user_details'];
            $query="INSERT INTO USERS_TABLE (ID,EMAIL,PASSWORD,NUME,PRENUME,TELEFON,DETALII,JUDET,LOCALITATE) VALUES (null,'${email}','${password}','${last_name}','${first_name}','${phone}','${details}','${county}','${town}')";
            $this->conn->query($query);
            $_SESSION['log_email']=$email;
            $_SESSION['log_phone']=$phone;
            $_SESSION['log_user_first_name']=$first_name;
            $_SESSION['log_user_last_name']=$last_name;
            $_SESSION['log_county']=$county;
            $_SESSION['log_town']=$town;
            $_SESSION['log_details']=$details;
            return true;
        }
    }
    public function get_counties_api(){
        if($this->conn==null){
            echo exit();
        }else{
            $query="SELECT NAME FROM ACCOUNT_COUNTY";
            $stmt=$this->conn->query($query);
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result!=false){
                $ouptut_options="";
                if(isset($_SESSION['user_county'])){
                    $ouptut_options="<option>Choose</option>";
                    for($i=0;$i<count($result);$i++){
                        if(strtoupper($_SESSION['user_county'])==strtoupper($result[$i]['NAME'])){
                            $ouptut_options=$ouptut_options."<option selected>";
                        }else{
                            $ouptut_options=$ouptut_options."<option>";
                        }
                        $ouptut_options=$ouptut_options.$result[$i]['NAME'];
                        $ouptut_options=$ouptut_options."</option>";   
                    }
                }else{
                    $ouptut_options="<option selected>Choose</option>";    
                    for($i=0;$i<count($result);$i++){
                        $ouptut_options=$ouptut_options."<option>".$result[$i]['NAME']."</option>";
                    }
                }
                header('Content-Type: text/html; charset=utf-8;');
                echo $ouptut_options;
            }else{
                echo "";
            }
        }
        exit();
    }
    public function get_towns_api($county_name){
        if($this->conn==null){
            exit();
        }else{
            $query="SELECT ACCOUNT_CITY.NAME CITY_NAME FROM ACCOUNT_COUNTY JOIN ACCOUNT_CITY ON ACCOUNT_COUNTY.ID=ACCOUNT_CITY.COUNTY_ID  WHERE UPPER(ACCOUNT_COUNTY.NAME)=UPPER('${county_name}')";
            $stmt=$this->conn->query($query);
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result!=false){
                if(isset($_SESSION['user_town'])){
                    $ouptut_options="<option>Choose</option>";
                    for($i=0;$i<count($result);$i++){
                        if(strtoupper($_SESSION['user_town'])==strtoupper($result[$i]['CITY_NAME'])){
                            $ouptut_options=$ouptut_options."<option selected>";
                        }else{
                            $ouptut_options=$ouptut_options."<option>";
                        }
                        $ouptut_options=$ouptut_options.$result[$i]['CITY_NAME'];
                        $ouptut_options=$ouptut_options."</option>";   
                    }
                }else{
                    $ouptut_options="<option selected>Choose</option>";    
                    for($i=0;$i<count($result);$i++){
                        $ouptut_options=$ouptut_options."<option>".$result[$i]['CITY_NAME']."</option>";
                    }
                }
                header('Content-Type: text/html; charset=utf-8;');
                echo $ouptut_options;
            }
        }
    }
    public function perform_account_creation(){
        if($this->check_valid_account()){
            header("Location:http://localhost/ProiectTW/Online-Toys/home");
        }else{
            header("Location:http://localhost/ProiectTW/Online-Toys/create_account");
        }
    }

    public function __construct(){
        include 'database_model.php';
        $db=new DatabaseModel();
        $this->conn=$db->get_db_conn();
    }
}

if(isset($_GET['action'])){
    $aux_acc=new AccountModel();
    switch($_GET['action']){
        case 'login':{
            if(isset($_POST['email']) && isset($_POST['password'])){
                $aux_acc->perform_login($_POST['email'],$_POST['password']);
            }else{
                //redirect to error page
            }
            break;
        }
        case 'create_account':{
            $aux_acc->perform_account_creation();
            break;
        }
        case 'get_counties_api':{
            $aux_acc->get_counties_api();
            break;
        }
        case 'get_towns_api':{
            if(isset($_GET['town_name'])){
                $aux_acc->get_towns_api($_GET['town_name']);
            }
            break;
        }
        default:{
            //redirect to error page
        }
    }
}

?>