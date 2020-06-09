

function change_pictures(input_object){
    if(input_object.files.length>0){
        input_object.nextElementSibling.innerHTML="";
    }
}
function change_product_name(input_object){
    if(input_object.value!==""){
        input_object.nextElementSibling.innerHTML="";
    }
}

function change_function(input_object){
    if(input_object.value.localeCompare("Choose")!=0){
        input_object.nextElementSibling.innerHTML="";
    }
}

function valid_formular(){
    var scr_fields=document.getElementsByClassName("scr_field");
    var product_name=document.getElementById("product_name_id");
    var product_price=document.getElementById("product_price_id");
    var product_stock=document.getElementById("product_stock_id");
    var ok=true;
    for(var i=0;i<scr_fields.length;i++){
        if(scr_fields[i].value.localeCompare("Choose")===0){
            scr_fields[i].nextElementSibling.innerHTML="Empty field";
            ok=false;
        }
    }
    if(product_stock.value===""){
        product_stock.nextElementSibling.innerHTML="Product stock is required";
        ok=false;
    }
    if(product_name.value===""){
        product_name.nextElementSibling.innerHTML="Product name is required";
        ok=false;
    }
    if(product_price.value===""){
        product_price.nextElementSibling.innerHTML="Product name is required";
        ok=false;
    }
    if(document.getElementById("pictures_container").files.length==0){
        document.getElementById("pictures_container").nextElementSibling.innerHTML="Pictures are  required";
        ok=false;
    }else{
        var files_ext=['JPG','PNG','BMP'];
        var pictures=document.getElementById("pictures_container").files;
        var local_ok=true;
        for(var i=0;i<pictures.length;i++){
            if(files_ext.includes(pictures[i].name.split('.').pop().toUpperCase())==false){
                local_ok=false;
                ok=false;
            }
        }
        if(local_ok==false){
            document.getElementById("pictures_container").nextElementSibling.innerHTML="Picture format unknown";    
        }
    }
    if(ok==true){
        document.getElementById('main_container').submit();
    }
    
}