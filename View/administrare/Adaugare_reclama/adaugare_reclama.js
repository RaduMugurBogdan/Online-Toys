

function check_motto(){
    var motto_value=document.getElementById("motto_field").value;
    if(motto_value.trim()===""){
        document.getElementById("motto_error").innerHTML="Motto required";
        return false;
    }
    document.getElementById("motto_field").value=document.getElementById("motto_field").value.replace(/(?:\r\n|\r|\n)/g, '<br>');
    return true;
}

function check_pictures(){
    var files_ext=['JPG','PNG','BMP'];
    var pictures=document.getElementById("picture_field").files;
    if(pictures===undefined){
        document.getElementById("picture_error").innerHTML="Picture required";
        return false;
    }
    if(pictures.length>1){
        document.getElementById("picture_error").innerHTML="Too many pictures";
        return false;
    }
    for(var i=0;i<pictures.length;i++){  
        if(files_ext.includes(pictures[i].name.split('.').pop().toUpperCase())==false){
            document.getElementById("picture_error").innerHTML="Picture format unknown";  
            return false;
        }
    } 
    return true;   
}





function perform_submit(){
    if(check_pictures() & check_motto()){
        document.getElementById("inputs_container").submit();
    }
}