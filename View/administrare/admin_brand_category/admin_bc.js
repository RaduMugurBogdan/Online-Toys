function load_brands(){
    var xhttp = new XMLHttpRequest();
    document.getElementById("brand_field").innerHTML="<option selected>Choose</option>";
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var input_object=JSON.parse(this.responseText);
            if(input_object!=undefined){
                var filter_value="";
                for(var i=0;i<input_object.length;i++){
                    filter_value=filter_value+"<option>"+input_object[i]['nume_brand']+"</option>";
                }
                document.getElementById("brand_field").innerHTML+=filter_value;
            }                
        }
    };
    xhttp.open("GET", "http://localhost/ProiectTW/Online-Toys/Model/products_model.php?action=get_brands", true);
    xhttp.send();
}

function load_categories(){
    var xhttp = new XMLHttpRequest();
    document.getElementById("category_field").innerHTML="<option selected>Choose</option>";
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var input_object=JSON.parse(this.responseText);
            if(input_object!=undefined){   
                var filter_value="";
                for(var i=0;i<input_object.length;i++){
                    filter_value=filter_value+"<option>"+input_object[i]['categorie']+"</option>";
                }
                document.getElementById("category_field").innerHTML+=filter_value;   
            }
        }
    };
    xhttp.open("GET", "http://localhost/ProiectTW/Online-Toys/Model/products_model.php?action=get_categories", true);
    xhttp.send();
}




function valid_brand_name(){
    if(document.getElementById("insert_brand_field").value==""){
        document.getElementById("brand_field_error").innerHTML="Please insert the brand name";
        return;    
    }
    document.getElementById("new_brand_form").submit();   
}

function valid_category_name(){
    if(document.getElementById("insert_category_field").value==""){
        document.getElementById("category_field_error").innerHTML="Please insert the category name";
        return;    
    }
    document.getElementById("new_category_form").submit();
}




function first_load(){
    load_brands();
    load_categories();
}



function change_brand(){
    if(document.getElementById("brand_field").value.localeCompare("Choose")==0){
        document.getElementById("delete_brand_button").disabled=true;
    }else{
        document.getElementById("delete_brand_button").disabled=false;
    }
}

function change_category(){
    if(document.getElementById("category_field").value.localeCompare("Choose")==0){
        document.getElementById("delete_category_button").disabled=true;
    }else{
        document.getElementById("delete_category_button").disabled=false;
    }
}
