<?php
    if(isset($_SESSION)==false){
        session_start();
    }
    $user_action="http://localhost/ProiectTW/Online-Toys/account_config";
    if(isset($_SESSION['log_email'])==false){
        $user_action="http://localhost/ProiectTW/Online-Toys/login";
    }
?>


<nav id="nav_frame_container">
            <nav id="frame_nav">
                <section id="menu">
                    <section class="menu_item" id="logo_text">
                        <a href="http://localhost/ProiectTW/Online-Toys/home">
                            OnlineToys            
                        </a>
                    </section>
                    <section class="menu_item menu_item_disp"  id="cat_2">
                        <a href="http://localhost/ProiectTW/Online-Toys/products">
                            Toys
                        </a> 
                    </section>
                    <section class="menu_item menu_item_disp"  id="cat_2">
                        Contact
                    </section>
                </section>
                <section id="searching_panel">
                    <input type="text" id="search_bar">
                    <button id="search_button" ><i class="material-icons" style="font-size:36px">search</i></button>
                </section>
                <section id="client_options_panel">
                    <?php
                        if($path[3]==='products'){
                            echo '<section class="client_item" id="filter_option" onclick="show_filter_menu()"><i class="fa fa-filter" style="font-size:30px"></i></section>';
                        }
                    ?>
                    <section class="client_item" >
                        <a href="http://localhost/ProiectTW/Online-Toys/account_config?action=favorite"><i class='fas fa-star' style='font-size:30px'></i></a> 
                    </section>
                    <section class="client_item" >
                        <a href="http://localhost/ProiectTW/Online-Toys/account_config?action=chart"><i class='fas fa-shopping-cart' style='font-size:30px'></i></a>  
                    </section>
                    <section class="client_item" >
                        <a href="<?php echo $user_action;?>"><i class='fas fa-user-circle' style='font-size:30px'></i></a>    
                    </section>
                </section>
                <section id="hide_button_container" onclick="nav_view_change_state()">
                    <i class='fas fa-angle-down' id="hide_down_button"></i>
                    <i class='fas fa-angle-up' id="hide_up_button"></i>
                </section>
            </nav>
</nav>