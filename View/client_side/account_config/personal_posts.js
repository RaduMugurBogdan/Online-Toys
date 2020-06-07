function delete_favorite(input_object,user_id,post_id){
    var closest_parrent=input_object.closest(".post_container");
    closest_parrent.style.display="none";
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "http://localhost/ProiectTW/Online-Toys/Model/account_model.php?action=delete_favorite&user_id="+user_id+"&product_id="+post_id, true);
    xmlhttp.send();
}
