
function close_filter(){
    document.getElementById("nav_details_container").style.display="none";
}
function show_filter_menu(){
    document.getElementById("nav_details_container").style.display="flex";
}
nav_view_state=false;

function nav_view_change_state(){
    if(nav_view_state==false){
        nav_view_state=true;
        document.getElementById("hide_down_button").style.display="none";
        document.getElementById("hide_up_button").style.display="inline";
        document.getElementById("searching_panel").style.display="flex";
        document.getElementById("client_options_panel").style.display="flex";
        disp_item=document.getElementsByClassName("menu_item_disp");
        disp_item[0].style.display="flex";
        disp_item[1].style.display="flex";
        
    }else{
        nav_view_state=false;
        document.getElementById("hide_down_button").style.display="inline";
        document.getElementById("hide_up_button").style.display="none";
        document.getElementById("searching_panel").style.display="none";
        document.getElementById("client_options_panel").style.display="none";
        disp_item=document.getElementsByClassName("menu_item_disp");
        disp_item[0].style.display="none";
        disp_item[1].style.display="none";
    }
}
