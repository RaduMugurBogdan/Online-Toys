
var max_items;//numarul maxim de produse ce pot fi afisate pe o singura pagina
var pages_number;//numarul de pagini
var items_number;//numarul total de produse
var curent_page=0;//pagina curenta la care se afla user-ul

function hide_all_items(){
    var mini_views=document.getElementsByClassName("product_mini_view");
    for(var i=0;i<mini_views.length;i++){
        mini_views[i].style.display="none";
    }
}

function init_page(){
    var mini_views=document.getElementsByClassName("product_mini_view");
    items_number=mini_views.length;
    max_items=12;
    pages_number=Math.floor(items_number/max_items)+((items_number%max_items!=0)?1:0); 
    for(var i=0;i<max_items && i<items_number;i++){
        mini_views[i].style.display="flex";
    }
    show_update();
}


function show_update(){
    document.getElementById("curent_page").innerHTML=curent_page+1;
    document.getElementById("pages_number").innerHTML=pages_number;
}

function get_next_page(){
    if(curent_page<pages_number-1){
        hide_all_items();
        var mini_views=document.getElementsByClassName("product_mini_view");
        curent_page++;
        for(var i=(curent_page)*max_items;i<(curent_page+1)*max_items && i<items_number;i++){
            mini_views[i].style.display="flex";
        }
        show_update();
    }
}

function get_preview_page(){
    if(curent_page>0){
        hide_all_items();
        var mini_views=document.getElementsByClassName("product_mini_view");
        curent_page--;
        for(var i=(curent_page)*max_items;i<(curent_page+1)*max_items;i++){
            mini_views[i].style.display="flex";
        }
        show_update();
    }
}