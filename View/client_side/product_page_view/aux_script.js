var curent_image=0;
function default_style(){
    elements=document.getElementsByClassName("car_picture");
    if(elements.length>0){
        elements[0].style.display="inline";
        document.getElementById('picture_counter').innerHTML="1/"+elements.length;
    }
    modify_picture_counter();
}
default_style();

function modify_picture_counter(){
    document.getElementById("picture_counter").innerHTML=curent_image+1+"/"+document.getElementsByClassName("car_picture").length;
}

function next_picture(){
    elements=document.getElementsByClassName("car_picture");
    elements[curent_image].style.display="none";
    if(elements.length>0){
        curent_image=(curent_image+1)%elements.length;
        elements[curent_image].style.display="inline";   
    }
    modify_picture_counter();
}


function preview_picture(){
    elements=document.getElementsByClassName("car_picture");
    elements[curent_image].style.display="none";
    if(curent_image==0){
        curent_image=elements.length-1;
    }else{
        curent_image--;
    }
    elements[curent_image].style.display="inline";
    modify_picture_counter();
}



function get_onload_fav_value(user_id,post_id){
   
    let aux_var=document.getElementById("fav_button_id");
    if(user_id==undefined || post_id==undefined){
        aux_var.innerHTML="Adauga la favorite";
        aux_var.disabled=true;
        return;
    }
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var exists_fav=true;
            var input_object=document.getElementById("fav_button_id");
            if(this.responseText.trim().toUpperCase().localeCompare('FALSE')==0){
                exists_fav=false;
            }
            if(exists_fav==true){    
                aux_var.innerHTML="Sterge din favorite";
                aux_var.style.backgroundColor="red";
            }else{
                aux_var.innerHTML="Adauga la favorite";
                aux_var.style.backgroundColor="deepskyblue";
            }
            
        }
    };
    xmlhttp.open("GET", "http://localhost/ProiectExpNet/Model/favorite_model.php?option=exists&post_id="+post_id+"&user_id="+user_id, true);
    xmlhttp.send();
}

function modify_favorite(user_id,post_id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var exists_fav=true;
            var input_object=document.getElementById("fav_button_id");
            if(this.responseText.trim().toUpperCase().localeCompare('FALSE')==0){
                exists_fav=false;
            }
            if(exists_fav==true){
                input_object.innerHTML="Adauga la favorite";
                input_object.style.backgroundColor="deepskyblue";
                delete_favorite(user_id,post_id);
            }else{
                input_object.innerHTML="Sterge din favorite";
                input_object.style.backgroundColor="red";
                insert_favorite(user_id,post_id);
            }
        }
    };
    xmlhttp.open("GET", "http://localhost/ProiectExpNet/Model/favorite_model.php?option=exists&post_id="+post_id+"&user_id="+user_id, true);
    xmlhttp.send();
}

function insert_favorite(user_id,post_id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "http://localhost/ProiectExpNet/Model/favorite_model.php?option=insert&post_id="+post_id+"&user_id="+user_id, true);
    xmlhttp.send();
}
function delete_favorite(user_id,post_id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "http://localhost/ProiectExpNet/Model/favorite_model.php?option=delete&post_id="+post_id+"&user_id="+user_id, true);
    xmlhttp.send();
}

function favorite_action(user_id,post_id){
    if(user_id==undefined || post_id==undefined){
        alert("Niciun cont activ");
        return;
    }
    modify_favorite(user_id,post_id); 
}