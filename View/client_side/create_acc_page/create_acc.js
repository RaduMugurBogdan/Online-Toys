function validate_email(input_object){
    document.getElementById("email_warning").innerHTML="";
    if(input_object.value.length==0){
        return false;
    } 
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(input_object.value)){
        return true;
    }
    document.getElementById("email_warning").innerHTML="Adresa invalida*";
    return false;
}

function validate_password(input_object){
    document.getElementById("password_warning").innerHTML=""; 
    if(input_object.value.length==0){
        return false;
    }else{
        var paswd='^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})';
        if(input_object.value.length<8){  
            document.getElementById("password_warning").innerHTML="Parola scurta(minim 8 caractere)"; 
            return false;
        }else if(input_object.value.length>15){
            document.getElementById("password_warning").innerHTML="Parola prea lunga(maxim 15 caractere)"; 
            return false;
        }else if(input_object.value.match(paswd)){
            return true;   
        }else{
            document.getElementById("password_warning").innerHTML="Parola slaba"; 
            return false;
        }
    }
}
function validate_conf_password(input_object){
    document.getElementById("conf_password_warning").innerHTML="";
    if(input_object.value.length==0){
        return false;
    }else{
        let pass_value=document.getElementById('password_field').value;
        let conf_pass_value=document.getElementById('conf_password_field').value;
        if(pass_value!=conf_pass_value){
            document.getElementById("conf_password_warning").innerHTML="Parolele nu corespund";        
            return false;
        }else{
            return true;
        }
    }
}
function validate_lastname(input_object){
    document.getElementById('lastname_warning').innerHTML="";
    if(input_object.value.length==0){
        document.getElementById('lastname_warning').innerHTML="Introduceti un nume";
        return false;
    }
    return true;
}
function validate_firstname(input_object){
    document.getElementById('firstname_warning').innerHTML="";
    if(input_object.value.length==0){
        document.getElementById('firstname_warning').innerHTML="Introduceti un prenume";
        return false;
    }
    return true;
}
function validate_phone(input_object){
    document.getElementById('phone_warning').innerHTML="";
    let phone_reg_exp='^(\([0-9]{3}\)|[0-9]{3})[0-9]{3}[0-9]{4}$';
    if(input_object.value.length==0){
        return false;
    }else if(input_object.value.match(phone_reg_exp)){
        return true;
    }else{
        document.getElementById('phone_warning').innerHTML="Valoarea incorecta";
        return false;
    }
}

function final_validation(input_object){
    let general_flag=true;
    if(validate_email(document.getElementById("email_field"))==false && document.getElementById("email_field").value==""){
        document.getElementById('email_warning').innerHTML="Email inexistent";
        general_flag=false;
    }    
    if(validate_password(document.getElementById("password_field"))==false && document.getElementById("password_field").value==""){
        document.getElementById("password_warning").innerHTML="Parola inexistenta";
        general_flag=false;
    }
    if(validate_conf_password(document.getElementById("conf_password_field"))==false && document.getElementById("conf_password_field").value==""){
        document.getElementById("conf_password_warning").innerHTML="Confirmati parola"
        general_flag=false;
    }
    if(validate_firstname(document.getElementById("lastname_field"))==false && document.getElementById("lastname_field").value==""){
        document.getElementById("lastname_warning").innerHTML="Introduceti un nume";
        general_flag=false;
    }
    if(validate_firstname(document.getElementById("firstname_field"))==false && document.getElementById("firstname_field").value==""){
        document.getElementById("firstname_warning").innerHTML="Introduceti un prenume";
        general_flag=false;
    }
    if(validate_phone(document.getElementById("phone_field"))==false && document.getElementById("phone_field").value==""){
        document.getElementById("phone_warning").innerHTML="Introduceti un numar de telefon";
        general_flag=false;
    }

    if(general_flag==true){
        //perform account connection
    }
}