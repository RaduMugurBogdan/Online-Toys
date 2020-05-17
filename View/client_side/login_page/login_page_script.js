function validate_login(){
    var email_value=document.getElementById("email_box").value;
    var password_value=document.getElementById("password_box").value;
    var email_reg_exp = /\S+@\S+\.\S+/;
    error_flag=false;
    
    if(email_value===""){
        error_flag=true;
        document.getElementById('email_warn').innerHTML="Empty field"
    }else if(email_reg_exp.test(email_value)==false){
        error_flag=true;
        document.getElementById('email_warn').innerHTML="The value is not an email"
    }
    if(password_value===""){
        error_flag=true;
        document.getElementById('password_warn').innerHTML="Empty field"
    }

    if(error_flag==false){
        document.getElementById('main_container').submit();
    }

}