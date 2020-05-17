function valid_email(){
    document.getElementById("email_error").innerHTML="";
    var email_reg_exp = /\S+@\S+\.\S+/;
    var email=document.getElementById("input_email").value;
    if(email_reg_exp.test(email)==false){
        document.getElementById("email_error").innerHTML="The value is not an email";
        return false;
    }
    return true
}
function valid_password(){
    document.getElementById("pass_error").innerHTML="";
    var pass_value=document.getElementById("input_pass").value;
    if(pass_value==""){
        document.getElementById("pass_error").innerHTML="Password is required";
        return false;
    }
    if(pass_value.length>=8){
        return true;
    }else{
        document.getElementById("pass_error").innerHTML="Password is too short (min 8 characters)";
        return false;
    }
}

function valid_password_conf(){
    document.getElementById("conf_pass_error").innerHTML="";
    var pass_value=document.getElementById("input_pass").value;
    var conf_pass_value=document.getElementById("input_conf_pass").value;
    if(conf_pass_value==""){
        document.getElementById("conf_pass_error").innerHTML="Password confirmation is required";
        return false;
    }else if(conf_pass_value.localeCompare(pass_value)!=0){
        document.getElementById("conf_pass_error").innerHTML="Password doesn't match";
        return false;
    }else{
        return true;
    }
}

function valid_county(){
    document.getElementById('county_error').innerHTML="";
    var county_value=document.getElementById("input_county").value;
    if(county_value.toUpperCase()=="CHOOSE"){
        document.getElementById('county_error').innerHTML="County required";
        return false;
    }
    return true;
}


function valid_town(){
    document.getElementById('town_error').innerHTML="";
    var town_value=document.getElementById('input_town').value;
    if(town_value===""){
        document.getElementById('town_error').innerHTML="Town name is required";
        return false;
    } 
    return true;
}

function valid_first_name(){
    document.getElementById('first_name_error').innerHTML="";
    var first_name_value=document.getElementById('input_first_name').value;
    if(first_name_value===""){
        document.getElementById('first_name_error').innerHTML="First name required";
        return false;
    }
    return true;
}

function valid_last_name(){
    document.getElementById('last_name_error').innerHTML="";
    var last_name_value=document.getElementById('input_last_name').value;
    if(last_name_value===""){
        document.getElementById('last_name_error').innerHTML="Last name required";
        return false;
    }
    return true;
}

function valid_phone_number(){
    document.getElementById('phone_error').innerHTML="";
    var phone_number=document.getElementById('input_phone').value;
    var phoneno_reg_ex = /^\d{10}$/;
    if(phoneno_reg_ex.test(phone_number)==false){
        document.getElementById('phone_error').innerHTML="Invalid phone number";
        return false;
    }
    return true;
}


function valid_postal_code(){
    document.getElementById('postal_code_error').innerHTML="";
    var first_name_value=document.getElementById('input_postal_code').value;
    if(first_name_value===""){
        document.getElementById('postal_code_error').innerHTML="Postal code required";
        return false;
    }
    return true;
}

function validate_inputs(){
    if(valid_email() & valid_password() & valid_first_name() & valid_last_name() & valid_password_conf() & valid_phone_number() & valid_county() & valid_town() & valid_postal_code()){
        return true;
    }
    return false;
}

function perform_request(){
    if(validate_inputs()){
        document.getElementById("main_container").submit();
    }
}
