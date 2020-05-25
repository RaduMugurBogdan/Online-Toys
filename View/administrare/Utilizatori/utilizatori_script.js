function valid_email(){
    document.getElementById("email_error").innerHTML="";
    var email_reg_exp = /\S+@\S+\.\S+/;
    var email=document.getElementById("input_email").value;
    if(email==""){
        return true;
    }
    if(email_reg_exp.test(email)==false){
        document.getElementById("email_error").innerHTML="The value is not an email";
        return false;
    }
    return true
}


function valid_phone_number(){
    document.getElementById('phone_error').innerHTML="";
    var phone_number=document.getElementById('input_phone').value;
    if(phone_number==""){
        return true;
    }
    var phoneno_reg_ex = /^\d{10}$/;
    if(phoneno_reg_ex.test(phone_number)==false){
        document.getElementById('phone_error').innerHTML="Invalid phone number";
        return false;
    }
    return true;
}


function validate_inputs(){
    if(valid_email() & valid_phone_number()){
        return true;
    }
    return false;
}

function perform_request(){
    if(validate_inputs()){
        document.getElementById("main_container").submit();
    }
}

function reset_fields(){
    document.getElementById("input_email").value="";
    document.getElementById("input_first_name").value="";
    document.getElementById("input_last_name").value="";
    document.getElementById("input_phone").value="";
    get_counties(null);
}

/********************************************************************/


function get_counties(){
    var xhttp = new XMLHttpRequest();
    document.getElementById("input_town").innerHTML="<option selected>Choose</option>";
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("input_county").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "http://localhost/ProiectTW/Online-Toys/Model/account_model.php?action=get_counties_api", true);
    xhttp.send();
} 

function change_county(input_object){
    if(input_object.value.localeCompare("Choose")!=0){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("input_town").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "http://localhost/ProiectTW/Online-Toys/Model/account_model.php?action=get_towns_api&town_name="+input_object.value, true);
        xhttp.send();
    }
}

function general_onload_function(){
    get_counties(); 
    init_view();
}

/**************************************************/
//results pagination

var max_items=50;
var pages_number;
var curent_page;


function hide_all_items(){
    var records=document.getElementsByClassName("record_row");
    for(var i=0;i<records.length;i++){
        records[i].style.display="none";
    }
    
}

function init_view(){
    var records=document.getElementsByClassName("record_row");
    pages_number=Math.floor(records.length/max_items)+(records.length%pages_number!=0)?1:0;
    curent_page=1;
    hide_all_items();
    if(records.length>0){    
        for(var i=0;i<records.length%max_items;i++){
            records[i].style.display="table-row";
        }
        set_values();
    }else{
        document.getElementById("client_mini_view").innerHTML='<h1 id="empty_result_label">There is not such client</h1>';
    }
}

function set_values(){
    document.getElementById("curent_page_number").innerHTML=curent_page;
    document.getElementById("pages_number").innerHTML=pages_number;
}

function next_page(){
    if(current_page+1<=pages_number){
        current_page=current_page+1;
        hide_all_items();
        var records=document.getElementsByClassName("record_row");
        for(i=(curent_page-1)*max_items;i<curent_page*max_items;i++){
            records[i].style.display="table-row";
        }
        set_values();
    }
}
function preview_page(){
    if(current_page-1>=1){
        current_page=current_page-1;
        hide_all_items();
        var records=document.getElementsByClassName("record_row");
        for(i=(curent_page-1)*max_items;i<curent_page*max_items;i++){
            records[i].style.display="table-row";
        }
        set_values();
    }
}



/************************************************************ */
//fereastra
function close_window(){
    document.getElementById("sep_container").style.display="none";
}

function show_window(){
    document.getElementById("sep_container").style.display="flex";
}
function show_details(input_row){
    var details_value=input_row.getElementsByClassName("hidden_details")[0].innerHTML;
    document.getElementById("details_title_label").innerHTML='Detalii';
    if(details_value==""){
        document.getElementById("details_content").innerHTML="Detalii insexistente";
    }else{
      document.getElementById("details_content").innerHTML=details_value;
    }
    show_window();
}