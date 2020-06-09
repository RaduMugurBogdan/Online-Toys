<?php
if(isset($_SESSION)==false){
    session_start();
}

class AccountModel{
    private $conn=null;
    private function check_valid_login($email,$password){
        /***********************************************/
        //variabilele necesare pentru retinerea informatiilor clientului curent
        unset($_SESSION['log_id']);
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
            $_SESSION['log_id']=$result['ID'];
            $_SESSION['log_email']=$result['EMAIL'];
            $_SESSION['log_phone']=$result['TELEFON'];
            $_SESSION['log_user_first_name']=$result['PRENUME'];
            $_SESSION['log_user_last_name']=$result['NUME'];
            $_SESSION['log_county']=$result['judet'];
            $_SESSION['log_town']=$result['localitate'];
            $_SESSION['log_details']=$result['detalii'];
            
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
        unset($_SESSION['log_id']);
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
            $query="INSERT INTO USERS_TABLE (ID,EMAIL,PASSWORD,NUME,PRENUME,TELEFON,DETALII,JUDET,LOCALITATE,DATA_REC) VALUES (null,'${email}','${password}','${last_name}','${first_name}','${phone}','${details}','${county}','${town}',SYSDATE())";
            $this->conn->query($query);
            $_SESSION['log_id']=$this->conn->lastInsertedId;
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
    public function get_users_data(){
        if($this->conn==null){
            return null;
        }
        
        unset($_SESSION['users_filter_result']);
        unset($_SESSION['users_filter_email']);
        unset($_SESSION['users_filter_first_name']);
        unset($_SESSION['users_filter_last_name']);
        unset($_SESSION['users_filter_phone']);
        unset($_SESSION['users_filter_county']);
        unset($_SESSION['users_filter_town']);

        $query="SELECT * FROM USERS_TABLE";
        $email_filter="";
        if(!empty($_POST['email'])){
            $email=$_POST['email']; 
            $email_filter="EMAIL='${email}'";
            $_SESSION['users_filter_email']=$email;
        }
        $fst_name_filter="";
        if(!empty($_POST['first_name'])){
            $fst_name=$_POST['first_name']; 
            $fst_name_filter="PRENUME='${fst_name}'";
            $_SESSION['users_filter_first_name']=$fst_name;
        }
        
        $last_name_filter="";
        if(!empty($_POST['last_name'])){
            $last_name=$_POST['last_name']; 
            $last_name_filter="NUME='${last_name}'";
            $_SESSION['users_filter_last_name']=$last_name;
        }
        
        $phone_filter="";
        if(!empty($_POST['phone'])){
            $phone=$_POST['phone']; 
            $phone_filter="TELEFON='${phone}'";
            $_SESSION['users_filter_phone']=$phone;
        }

        $county_filter="";
        if(!empty($_POST['county']) && strtoupper($_POST['county'])!=="CHOOSE"){
            $county=$_POST['county']; 
            $county_filter="judet='${county}'";
            $_SESSION['users_filter_county']=$county;
        }
        
        $town_filter="";
        if(!empty($_POST['town']) && strtoupper($_POST['town'])!=="CHOOSE"){
            $town=$_POST['town']; 
            $town_filter="localitate='${town}'";
            $_SESSION['users_filter_town']=$town;
        }
        $filter_array=array($email_filter,$fst_name_filter,$last_name_filter,$phone_filter,$county_filter,$town_filter);
        $concat_result="";
        for($i=0;$i<count($filter_array);$i++){
            $concat_result.=$filter_array[$i];
        }
        if($concat_result!==""){
            $query.=" WHERE ";
            $first_condition=false;
            for($i=0;$i<count($filter_array);$i++){
                if($filter_array[$i]!==""){
                    if($first_condition==false){    
                        $val=$filter_array[$i];
                        $query.=" ${val} ";
                        $first_condition=true;
                    }else{
                        $val=$filter_array[$i];
                        $query.=" AND ${val} ";
                    }
                }
            }
        }   

        $stmt=$this->conn->query($query);
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result!=false){
            $_SESSION['users_filter_result']=$result;
        }

        header('Location:../View/administrare/Utilizatori/utilizatori.php');
        exit;
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
    public function perform_log_out(){
        if(isset($_SESSION)){
            session_destroy();
        }
        header("Location:http://localhost/ProiectTW/Online-Toys/home");
        exit;
    }
    public function perform_account_creation(){
        if($this->check_valid_account()){
            header("Location:http://localhost/ProiectTW/Online-Toys/home");
        }else{
            header("Location:http://localhost/ProiectTW/Online-Toys/create_account");
        }
    }
    public function is_fav($user_id,$product_id){
            $query="SELECT 1 FROM FAVORITE WHERE ID_PRODUS='${product_id}' AND  ID_CLIENT='${user_id}'";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            if(empty($result)==true){
                return false;
            }
            return true;
    }

    public function get_client_favorites(){
        if(isset($_SESSION['log_id'])){
            require_once './Model/products_model.php';
            $pm=new ProductsModel();
            $user_id=$_SESSION['log_id'];
            $query="SELECT * FROM FAVORITE JOIN PRODUSE ON FAVORITE.ID_PRODUS=PRODUSE.ID JOIN POZE_PRODUSE ON PRODUSE.ID=POZE_PRODUSE.ID_PRODUS WHERE ID_CLIENT='${user_id}' GROUP BY PRODUSE.ID";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
    public function delete_favorite($user_id,$fav_id){
            $query="DELETE FROM FAVORITE WHERE ID_CLIENT='${user_id}'";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
    }
    public function insert_favorite($user_id,$fav_id){
            $query="INSERT INTO FAVORITE(ID,ID_CLIENT,ID_PRODUS) VALUES(NULL,'${user_id}','${fav_id}')";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }


  

    public function is_chart_item($user_id,$product_id){
        $query="SELECT 1 FROM CHART WHERE ID_PRODUS='${product_id}' AND  ID_CLIENT='${user_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(empty($result)==true){
            return false;
        }
        return true;
    }

    public function delete_chart_item($user_id,$fav_id){
        $query="DELETE FROM CHART WHERE ID_CLIENT='${user_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }
    public function insert_chart_item($user_id,$product_id){
            $query="INSERT INTO CHART(ID,ID_CLIENT,ID_PRODUS) VALUES(NULL,'${user_id}','${product_id}')";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
    }
    public function set_chart_empty($user_id){
        $query="DELETE FROM CHART WHERE ID_CLIENT='${user_id}'";
        $stmt=$this->conn->prepare($query);
        $stmt->execute();
    }

    public function get_client_chart(){
        if(isset($_SESSION['log_id'])){
            require_once './Model/products_model.php';
            $pm=new ProductsModel();
            $user_id=$_SESSION['log_id'];
            $query="SELECT * FROM CHART JOIN PRODUSE ON CHART.ID_PRODUS=PRODUSE.ID JOIN POZE_PRODUSE ON PRODUSE.ID=POZE_PRODUSE.ID_PRODUS WHERE ID_CLIENT='${user_id}' GROUP BY PRODUSE.ID";
            $stmt=$this->conn->prepare($query);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    public function __construct(){
        require_once 'database_model.php';
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
        case 'get_user_data':{
            $aux_acc->get_users_data();
            break;
        }
        case 'perform_log_out':{
            $aux_acc->perform_log_out();
            break;
        }
        case 'insert_favorite':{
            if(isset($_GET['user_id']) && isset($_GET['product_id'])){
                $aux_acc->insert_favorite($_GET['user_id'],$_GET['product_id']);
                header("Location:http://localhost/ProiectTW/Online-Toys/product_page?product_id=".$_GET['product_id']);
            }
            break;
        }
        case 'delete_favorite':{
            if(isset($_GET['user_id']) && isset($_GET['product_id'])){
                $aux_acc->delete_favorite($_GET['user_id'],$_GET['product_id']);
                header("Location:http://localhost/ProiectTW/Online-Toys/account_config?target=favorite");
            }
            break;
        }
        case 'exists':{
            if(isset($_GET['user_id']) && isset($_GET['product_id'])){
                if($aux_acc->is_fav($_GET['user_id'],$_GET['product_id'])==true){
                    echo 'true';
                }else{
                    echo 'false';
                }
                exit;
                //header("Location:http://localhost/ProiectTW/Online-Toys/account_config?target=favorite");
            }
        }
        /*********************************************************************************** chart api */
        case 'insert_chart':{
            if(isset($_GET['user_id']) && isset($_GET['product_id'])){
                $aux_acc->insert_chart_item($_GET['user_id'],$_GET['product_id']);
                header("Location:http://localhost/ProiectTW/Online-Toys/product_page?product_id=".$_GET['product_id']);
            }
            break;
        }
        case 'delete_chart':{
            if(isset($_GET['user_id']) && isset($_GET['product_id'])){
                $aux_acc->delete_chart_item($_GET['user_id'],$_GET['product_id']);
                header("Location:http://localhost/ProiectTW/Online-Toys/account_config?target=chart");
            }
            break;
        }
        case 'exists_chart':{
            if(isset($_GET['user_id']) && isset($_GET['product_id'])){
                if($aux_acc->is_chart_item($_GET['user_id'],$_GET['product_id'])==true){
                    echo 'true';
                }else{
                    echo 'false';
                }
                exit;
                //header("Location:http://localhost/ProiectTW/Online-Toys/account_config?target=favorite");
            }
        }
        default:{
            //redirect to error page
        }
    }
}

?>