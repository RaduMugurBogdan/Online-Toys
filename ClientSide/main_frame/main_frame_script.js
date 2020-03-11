

                var item_selected;
                var selected_item_value;
                function set_visible_categorys(){
                    var elements = document.getElementsByClassName("product_filter_category");
                    for (var i = 0, len = elements.length; i < len; i++) {
                        elements[i].style.display="flex";
                        elements[i].style.height="auto";
                    }
                }
                function hide_categorys(){
                    var elements = document.getElementsByClassName("product_filter_category");
                    for (var i = 0, len = elements.length; i < len; i++) {
                        elements[i].style.display="none";
                        elements[i].style.height="0px";
                        
                    }
                }
                
                function keep_p(curent_object){
                    reset_all_items(curent_object);
                    curent_object.style.color="white";
                    curent_object.style.backgroundColor="#001f3f";
                    item_selected=false;


                    
                    document.getElementById("nav_details_container").style.height="0px";
                    
                    document.getElementById("frame_nav").style.borderBottomStyle="none";
                }
                function reset_all(){
                    if(item_selected==false){    
                        if(document.getElementById("nav_details_container").clientHeight==500){    
                            var elements = document.getElementsByClassName("menu_item");
                            for (var i = 0, len = elements.length; i < len; i++) {
                                elements[i].style.backgroundColor="#0074D9";   
                                elements[i].style.color="#001f3f";   
                            }
                            hide_categorys();
                            
                            document.getElementById("nav_details_container").style.height="0px";
                            
                            document.getElementById("frame_nav").style.borderBottomStyle="none";
                            
                        }
                    }

                }
                function reset_all_items(curent_object){
                    var elements = document.getElementsByClassName("menu_item");
                    for (var i = 0, len = elements.length; i < len; i++) {
                        if(elements[i].id!=curent_object.id){    
                            elements[i].style.backgroundColor="#0074D9";   
                            elements[i].style.color="#001f3f";   
                        }
                    }
                    
                    hide_categorys();

                    document.getElementById("nav_details_container").style.height="0px";
                    document.getElementById("frame_nav").style.borderBottomStyle="solid"; 
                }
                function resize_function(curent_object){//apelata la momentul trecerii mouse-ului peste o categorie
                    item_selected=true;
                    selected_item_value=curent_object;
                    reset_all_items(curent_object);
                    curent_object.style.color="white";
                    curent_object.style.backgroundColor="#001f3f";

                    document.getElementById("nav_details_container").style.height="500px";
                    
                    
                    set_visible_categorys();
                    document.getElementById("frame_nav").style.borderBottomStyle="none";
                }
                function resize_container(curent_object){//functia apelata de trecerea mouse-ului peste container
                    item_selected=true;
                    document.getElementById("frame_nav").style.borderBottomStyle="none"; 
                    curent_object.style.height="500px";
                    set_visible_categorys();
                    selected_item_value.style.color="white";
                    selected_item_value.style.backgroundColor="#001f3f";
                }
                function default_container(curent_object){
                    if(item_selected==true){ 
                        hide_categorys();
                        curent_object.style.height="0px"; 
                        item_selected=false;   
                    }
                }